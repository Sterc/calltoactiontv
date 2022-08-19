Changelog for CallToActionTV.

CallToActionTV 3.0.1
==============
- Fixed GetList processor to prevent error.
- Fix modx class references in getObject/newObject etc.
- Fix pdoTools/pdoFetch checks, replace getService.

CallToActionTV 3.0.0
==============
- MODX3 refactor

CallToActionTV 1.0.8
==============
- Fixed PHP warning: Undefined array key "inputTVid"

CallToActionTV 1.0.7
==============
- Fixed resource getlist processor

CallToActionTV 1.0.6
==============
- Show resource pagetitle when selected is not on first page (fixes issue #14). Thanks to kinaz (PR #15)
- Fix selecting resources from different contexts (PR #12)
- Fix xPDOQuery argument in prepareQueryBeforeCount method (fixes issue #13)

CallToActionTV 1.0.5
==============
- Add missing Dutch lexicon

CallToActionTV 1.0.4
==============
- Add support for MIGX
- Add Italian lexicon
- Fixed issue #9, javascript error if type is not 'resource'

CallToActionTV 1.0.3
==============
- Added extra option for adding GET parameters
- Paginated resource results

CallToActionTV 1.0.2
==============
- Improved parser handling
- Fixed issue with empty check which would show JSON output

CallToActionTV 1.0.1
==============
- Added pdoParser support #2
- Added option to pass output to placeholders #1
- Fixed makeUrls when using multicontext environment #3
- Fixed issue when using quotes in button text #4
- Automatically prepend external URL with protocol when its not provided #5

CallToActionTV 1.0.0
==============
- Initial release.