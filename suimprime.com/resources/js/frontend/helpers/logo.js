// Shared logo URL normalization and caching helpers

export const DEFAULT_DARK_LOGO = "/public/storage/uploads/logos/dark-logo.png";

function toAbsolute(url) {
    try {
        return new URL(url, window.location.origin).href;
    } catch (_) {
        return url;
    }
}

export function normalizeLogoUrl(val) {
    const input = (val || "").toString().trim();
    if (!input) return "/assets/logo/dark_logo.png"; // default app asset

    // Absolute URL
    if (/^https?:\/\//i.test(input)) return input;

    // Strip /public prefix since public is the web root
    if (input.startsWith("/public/")) return toAbsolute(input.replace("/public", ""));

    // Already mapped
    if (input.startsWith("/storage/") || input.startsWith("/assets/")) return toAbsolute(input);

    // Storage path without leading slash
    if (input.startsWith("storage/")) return toAbsolute("/" + input);

    // Uploads should map to the storage symlink
    if (input.startsWith("uploads/")) return toAbsolute("/storage/" + input);
    if (input.startsWith("/uploads/")) return toAbsolute("/storage" + input);

    // Known DB value pattern: 'storage/uploads/...'
    if (input.includes("storage/uploads/")) {
        const withSlash = input.startsWith("/") ? input : "/" + input;
        return toAbsolute(withSlash);
    }

    // Fallback: ensure it is absolute relative to current origin
    const rel = input.startsWith("/") ? input : "/" + input;
    return toAbsolute(rel);
}

export function cacheDarkLogo(value) {
    try {
        localStorage.setItem("settings_dark_logo", value || "");
    } catch (_) { }
}

export function readCachedDarkLogo() {
    try {
        return localStorage.getItem("settings_dark_logo");
    } catch (_) {
        return null;
    }
}
