# CHANGELOG

Automatic short entries are appended to this file by a GitHub Action.
Manual, richer entries will be added by maintainers when they make edits (hybrid approach).

## [2026-08-17] — Psylo (psylion)
- Commit ef1e8f98af1d3273645485db623f59adf75f7556
- Files: psylo.net/pgs1.html
- Message: Fix JS: declare globals, rename invalid identifier, modernize Space key checks, add replaceAll fallback
- Notes: Renamed invalid identifier `$2day` → `$twoDay`, declared previously implicit globals, replaced deprecated `e.keyCode` checks with modern `e.code`/`e.key`, added helper to strip parentheses from time strings, guarded audio element usage, and fixed Last-Modified header handling. Truncated placeholders ("[...]") left unchanged where original content was incomplete.

---

(Notes)
- This repository uses a hybrid changelog approach: the workflow at `.github/workflows/update-changelog.yml` will prepend a short entry for each push. Maintainers can and should add manual, more detailed entries above when they make changes.
