# NU Start Framework


## Important Notes:
# 1: Parent theme uses CodeKit (two separate builds atm) for Blocks and Theme
# 2: Child theme uses the @wordpress/scripts build proces

## Install Instructions
1. clone and extract per usual
2. unzip the archive in the plugins folder to deploy all required plugins
3. be sure to activate them before activating our child theme
4. tbd; the post-activation config

## Usage
1. activate the child theme only!
2. child theme is ultra-minimal; requires only npm install + npm start
3. child theme pulls in the "reqs" scscs folder including all vars, mixins etc.
4. the "style.scss" in the child theme is hooked up and functions as a "theme_override.scss"
