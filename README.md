# CallToActionTV
![calltoactiontv version](https://img.shields.io/badge/version-3.0.2-blue.svg) ![MODX Extra by Sterc](https://img.shields.io/badge/checked%20by-sterc-ff69b4.svg) ![MODX version requirements](https://img.shields.io/badge/modx%20version%20requirement-2.0%2B-brightgreen.svg)

## Usage

| Property       | Description                                                                            |
|----------------|----------------------------------------------------------------------------------------|
| input          | TV value of type calltoactiontv                                                        |
| options        | Custom chunk name                                                                      |
| toPlaceholders | Specify the placeholder prefix to output the values to placeholders using this prefix. |

If pdoTools is installed it will automatically use the pdoParser which also makes is posssible to use `@FILE` or `@INLINE` etc.

Default usage: `[[*ctatv:calltoactiontv]]` will output a link with the default CallToActionTV chunk.
In order to use a custom chunk you simply specify a chunk name like this:
```
[[*ctatv:calltoactiontv:=`MyCustomChunk`]]

Or, if you are using it as a snippet:
[[calltoactiontv?
    &input=`[[*ctatv]]`
    &options=`MyCustomChunk`
]]

Using toPlaceholders:
[[calltoactiontv?
    &input=`[[*ctatv]]`
    &options=`MyCustomChunk`
    &toPlaceholders=`ctatv.`
]]

<a href="[[+ctatv.href]]" title="[[+ctatv.text]]" target="[[+ctatv.target]]" rel="[[+ctatv.rel]]">
    [[+ctatv.text]]
</a>
```

### Input Option Values
If left empty all non-deleted and published resources will be retrieved using pagination. If input options are specified then pagination will occur, but the full list of options is retrieved once, so it is not optimized for speed.

# Free Extra
This is a free extra and the code is publicly available for you to change. The extra is being actively maintained and you're free to put in pull requests which match our roadmap. Please create an issue if the pull request differs from the roadmap so we can make sure we're on the same page.

Need help? [Approach our support desk for paid premium support.](mailto:service@sterc.com)
