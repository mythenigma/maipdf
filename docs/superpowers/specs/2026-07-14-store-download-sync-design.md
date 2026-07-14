# MaiPDF Store and Direct Download Sync

## Goal

Update the GitHub README and landing page so their App DRM description and download choices match the current `drm.maipdf.com` site.

## Content changes

- Keep both installation routes where available: an official app store and a direct installer.
- Link Android to Google Play while retaining the APK download.
- Link Windows to Microsoft Store while retaining the EXE download.
- Link macOS to the Mac App Store while retaining the DMG download.
- Keep iOS as an App Store installation.
- Remove the outdated statement that Google Play is still reviewing the Android app.
- Describe the current DRM capabilities: OS-level capture controls where supported, mirroring detection, per-page trace codes, guest-mode opening, expiry and open limits, device and recipient rules, and pause or revocation.
- State the practical limitation that capture controls cannot prevent someone from photographing a screen with another device.

## Files and presentation

- Update `README.md` so the GitHub repository page reflects the current product.
- Update `index.html` with the same availability and capability information.
- Preserve the existing visual design, direct-download filenames, and SHA-256 checksums.
- Keep the public copy in English to match the current repository.

## Verification

- Confirm all store URLs lead to the intended MaiPDF listings.
- Confirm all local download targets exist.
- Verify the checksums of the three direct installers.
- Search both files for outdated phrases such as `Google Play is in review`.
- Review the resulting diff for consistent wording between the README and landing page.
