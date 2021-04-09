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
    }

Also you need to set in your skin.json:

    "SkinOOUIThemes": {
        "yourskinname": "MWStakeOOJSUI"
    },

