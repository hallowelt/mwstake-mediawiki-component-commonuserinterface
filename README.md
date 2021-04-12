# MediaWiki Stakeholders Group - Components
# CommonUserInterface for MediaWiki

Provides common user interface elements and customizeable stylings

## How to use
In your skin add a css file with the following content:

    :root {
        --mws-primary: #0060df;
        --mws-primary--hover: #006eff;
        --mws-primary--active: #0060df;
        --mws-destructive: #d33;
        --mws-destructive--hover: #ff4242;
        --mws-destructive--active: #d33;
        --mws-error: #d33;
        --mws-warning: #fc3;
        --mws-success: #14866d;
    }

To use oojs-ui you also you need to set in your skin.json:

    "SkinOOUIThemes": {
        "yourskinname": "MWStakeOOJSUI"
    },

To use mediawiki-ui you also you need to set in your LocalSettings.php:

    $GLOBALS['mwsEnableMediaWikiUITheme'] = true;
