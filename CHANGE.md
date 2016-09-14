# version 1.2.7
- update to bootswatch 3.3.7

# version 1.2.6
- update to bootswatch 3.3.6+1

# version 1.2.5
- update dependency : thomaspark/bootswatch version 3.3.5+2. This is to avoid the *Failed to decode downloaded font* error message (see https://github.com/raoul2000/yii2-bootswatch-asset/issues/5)

# version 1.2.4
- update dependency : thomaspark/bootswatch version 3.3.5

# version 1.2.3
- update dependency : thomaspark/bootswatch version 3.3.4

# version 1.2.2
- fix : publish *woff2* font "glyphicons-halflings-regular.woff2" (thanks to [jwerner](http://www.yiiframework.com/user/147/))

# version 1.2.1
- update dependency : thomaspark/bootswatch version 3.3.2 after bootstrap 3.3.2 has been release

# version 1.2.0
- update dependency : thomaspark/bootswatch version 3.3.1 in order to include latest bootswatch themes (journal, sandstone).
- code style
- update README.md : add warning

# version 1.1.1
- fix : minified CSS was not correctly handled. Now, if YII_ENV_DEV is defined bootstrap.css is published, otherwise
its bootstrap.min.css

# version 1.1.0
- fix : gylphicons not accessible.
- enh : optimize publication process. When no theme is set, no publication is performed.
- enh : no theme is selected by default.

# version 1.0.0
- Initial release
