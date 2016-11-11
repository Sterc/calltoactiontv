$(function() {


    console.log('test');
    /**
     * Below is from ContentBlocks component.
     */
    //
    //resourcesSource: new Bloodhound({
    //    prefetch: {
    //        url: CallToActionConfig.connectorUrl + '?action=content/resources/prefetch',
    //        ttl: 3600000
    //    },
    //    remote: {
    //        url: CallToActionConfig.connectorUrl + '?action=content/resources/search&query=%TERM%',
    //        wildcard: '%TERM%',
    //        rateLimitWait: 0, // kill rate limiting or link names won't show up when CB is initialized
    //        rateLimitBy: 'throttle' // same as above
    //    },
    //    limit: 15,
    //    dupDetector: function(remoteMatch, localMatch) {
    //        return remoteMatch.id == localMatch.id;
    //    },
    //    datumTokenizer: function(d) {
    //        return d.tokens;
    //    },
    //    queryTokenizer: Bloodhound.tokenizers.whitespace
    //});

});