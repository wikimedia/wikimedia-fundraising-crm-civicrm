Status overview for upgrade:

=====================================================================================================================
Patches  tracked in JIRA - all ported to 4.6
=====================================================================================================================
big-fields patch CRM-17118 - action required - clarify long postcodes
delete patch CRM-10700
debug-queries patch #1 CRM-17144
debug-queries patch #1 CRM-17156
debug-upgrade patch - Bitcoin part - CRM-17157
empty-search-patch CRM-17158
expose-sql patch CRM-17144 (this didn't 100% apply onto 4.6 so need to check - if keeping)
export patch CRM-10675
language-freeform patch CRM-14232
option-cache patch CRM-17120
refund patch CRM-11503
triggers patch CRM-12315

=====================================================================================================================
Patches not currently tracked in JIRA - all ported to 4.6
=====================================================================================================================
failure patch
greetings patch
prevnext patch


=====================================================================================================================
Patches that are likely not to have survived the port
=====================================================================================================================
1) api-patch / exception patch- lot of stuff changed in core. Some stuff ported, some just too different.
2) Report output patches (e.g expose-sql-patch) - quite a lot of change. Potentially finish off CRM-17114 instead
3) Needs to check autocompletes. Note that the quicksearch autocomplete should be fast without the hook now - but
other autocompletes may now by-pass it.

=====================================================================================================================
Sunset Patches (These patches are ported to 4.6 but with a view to that being the last version they go on.)
=====================================================================================================================
dedupe patch
entity-tag patch
exception patch CRM-14674 (longer term switch to civicrm_api3 in our modules - could do this first too?)
wmf-local (just adds a readme)

=====================================================================================================================
Patches requiring css changes elsewhere (not ported)
=====================================================================================================================

style patch - note css has changed substantially since 4.2 & wouldn't apply

=====================================================================================================================
Patches I propose to drop (not ported)
=====================================================================================================================
acl-cache patch
admin-backport
advanced search patch CRM-10674
custom-names patch
dateadded patch
debug-upgrade patch - other part...
jcalendar patch
queryopt patch
sort-name patch
strict patch
typo patch
typo2 patch

=====================================================================================================================
Giant Rabbit report work analysis
=====================================================================================================================
This is currently here
https://docs.google.com/spreadsheets/d/1IcTicTdKwgf62INuTEoRjHZ_5ostMLCnfl6ahn3s8u0/edit#gid=0
