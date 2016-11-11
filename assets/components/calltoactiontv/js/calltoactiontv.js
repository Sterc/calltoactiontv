var CallToActionTVConfig;

+function ($) {
    var CallToActionTV = {
        $connectorUrl: '/calltoactiontv/assets/components/calltoactiontv/connector.php',


        $source: null,
        /**
         * Initialize.
         */
        init: function () {
            var self   = this;

            $.each($('.calltoactiontv input[id]'), function() {
                    self.initializeLinkField(this);
            });
        },

        /**
         *
         * @param input
         * @param data
         */
        initializeLinkField: function (input, data) {
            var self = this,
                data = data || {},
                $link = $(input),

                // because tmpl uses data.value the first time through, but we use data.link, and also because links as settings don't have data
                linkVal = (
                          $link.val() != 'undefined'
                          ) ? $link.val() : '',
                showDisplayText = function ($displayText) {
                    $displayText.css({'opacity': '1', 'z-index': '1'});
                },
                hideDisplayText = function ($displayText) {
                    $displayText.css({'opacity': '0', 'z-index': '-1'});
                },
                linkPattern = (
                              data.properties && data.properties.link_detection_pattern_override != ''
                              ) ? data.properties.link_detection_pattern_override : self['link_detection_pattern'],
                linkRE = new RegExp(linkPattern, 'i'),
                resourceRE = /^\[\[~\d*\]\]/,
                linkType = self.getLinkFieldDataType(linkVal);

            /**
             * Remove mailto: from email links.
             */
            linkVal = linkVal.replace('mailto:', '');

            self.setSource();

            /**
             * Find out if it's mostly numbers, i.e. a resource ID.
             */
            var resourceVal = parseInt(linkVal.replace(/[^\d]/g, ''));

            // account for [[~ ]] stored with the link. Esp. helpful in tinyrte.
            if (resourceRE.test(linkVal)) {
                $link.val(resourceVal.toString());
                linkType = 'resource';
            } else {
                // set this so that the mailto: is replaced in email links. Esp. helpful in tinyrte
                $link.val(linkVal);
            }

            var displayTextHolder = $('<div />', {class: 'calltoactiontv-field-link-displaytext'}).on(
                'click', function() {
                    $link.focus().select();
                }
            );
            hideDisplayText(displayTextHolder);

            $link.attr('data-link-type', linkType).before(displayTextHolder);
            if (linkType == 'resource') {
                self.getResourcenameById($link.val(), displayTextHolder);
                showDisplayText(displayTextHolder);
            }

            $link.typeahead(
                null, {
                    name      : 'resources-oss',
                    source    : self.$source.ttAdapter(),
                    templates : {
                        suggestion: function (datum) {
                            return '<p class="resource-id">#' + datum.id + ' <strong>' +  datum.pagetitle + '</strong></p>';
                        }
                    },
                    displayKey: 'id'
                }
            ).on(
                'typeahead:selected', function (eventObject, suggestionObject) {
                    displayTextHolder.text($('<div/>').html(suggestionObject.pagetitle).text());
                    $link.attr('data-link-type', 'resource').blur();
                }
            ).on(
                'keyup', function () {
                    // On each key stroke check the data type and update the shown icon
                    var val = $(this).val(),
                        type = self.getLinkFieldDataType(val);
                    $link.attr('data-link-type', type);
                }
            ).on(
                'blur', function () {
                    // When leaving the input type, check if we've added http(s)/ftp protocols
                    var val = $(this).val(),
                        type = self.getLinkFieldDataType(val);

                    if (type == 'link') {
                        if (val != '' && !linkRE.test(val)) {
                            $(this).val('http://' + val);
                        }
                    } else if (type == 'resource') {
                        showDisplayText(displayTextHolder);
                    }
                }
            ).on(
                'focus', function () {
                    hideDisplayText(displayTextHolder);
                }
            ).after('<span/>');

            $link.blur();
        },

        /**
         * Detect the value type.
         *
         * @param val
         * @returns {string}
         */
        getLinkFieldDataType: function (val)
        {
            var emailRE = new RegExp('^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$', 'i'),
                type = 'link';

            if (emailRE.test(val)) {
                type = 'email';
            }
            else if (val != '' && !isNaN(val)) {
                type = 'resource';
            }

            return type;
        },

        getResourcenameById:  function (link, displayLocation) {
            $.ajax ({
                type  : 'POST',
                url   :  CallToActionTV.$connectorUrl,
                data  : {
                    action     : 'mgr/resources/getpagetitle',
                    resourceId : link,
                },
                success : function(data) {
                    var pagetitle = data;
                    pagetitle = $('<div/>').html(pagetitle).text();
                    if (displayLocation.get(0).nodeName == 'INPUT') {
                        $(displayLocation).val(pagetitle);
                    } else {
                        $(displayLocation).text(pagetitle);
                    }
                }
            });
        },

        /**
         * Prefetch and search.
         */
        setSource : function() {
            var self = this;

            self.$source =  new Bloodhound({
                prefetch: {
                    url: CallToActionTVConfig.connectorUrl + '?action=mgr/resources/prefetch',
                    ttl: 3600000
                },
                remote        : {
                    url          : CallToActionTVConfig.connectorUrl + '?action=mgr/resources/search&query=%TERM%',
                    wildcard     : '%TERM%',
                    rateLimitWait: 0, // kill rate limiting or link names won't show up when CB is initialized
                    rateLimitBy  : 'throttle' // same as above
                },
                limit         : 15,
                dupDetector   : function (remoteMatch, localMatch) {
                    return remoteMatch.id == localMatch.id;
                },
                datumTokenizer: function (d) {
                    return d.tokens;
                },
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });
        }
    }

    $(document).ready(function() {
        CallToActionTV.init();
    });
}(jQuery);
