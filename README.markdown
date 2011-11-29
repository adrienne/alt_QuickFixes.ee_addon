# Publish/Edit Screen Quick Fixes #

This is a small set of fixes for persistent annoyances with the EE CP. It has several fixes for publish/edit, and a few for other various nuisances.

Currently, it does the following:

* Adds Month/Year dropdowns to all datepickers
* Hides (but does *not* remove from DOM) dropdowns for "Fixed/Localized" setting on all custom date fields
    * Removal from DOM can cause issues; as is, fields will be submitted with your Fixed/Localized setting intact, but user will not be able to change it from publish screen
* Enlarges Wyvern Styles and Format dropdowns (only if using default Wyvern skin)
* Adds empty `.corner()` function to control panel pages that don't have it, to avoid CP Theme JS errors being thrown by some themes
