# MediaWiki Stakeholders Group - Components
# CommonUserInterface for MediaWiki

Provides common user interface elements and customizeable stylings

## How to use
In your skin add a css file with the following content:

    :root {
        --mws-oojs-ui-primary: #0060df;
        --mws-oojs-ui-primary--hover: #006eff;
        --mws-oojs-ui-primary--active: #0060df;
        --mws-oojs-ui-destructive: #d33;
        --mws-oojs-ui-destructive--hover: #ff4242;
        --mws-oojs-ui-destructive--active: #d33;
    }

Also you need to set in your skin.json:

    "SkinOOUIThemes": {
        "yourskinname": "MWStakeOOJSUI"
    },

