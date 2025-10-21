import axios from "axios";

axios.defaults.withCredentials = true;

// In dev we'll use Vite proxy (relative paths) or same-origin when served by PHP locally.
const PROD_BASE = 'https://suimprime.com';

// If running in a browser, prefer same-origin (relative) when host is localhost/127.0.0.1
let baseURL = PROD_BASE;
if (typeof window !== 'undefined') {
	const host = window.location.hostname;
	if (host === '127.0.0.1' || host === 'localhost') {
		// frontend served locally via PHP or Vite — use same origin so cookies work
		baseURL = '/';
	} else if (import.meta?.env?.DEV) {
		// vite dev server — use proxy (relative)
		baseURL = '/';
	} else {
		baseURL = PROD_BASE;
	}
} else {
	// not in browser (build time) — respect Vite dev flag
	baseURL = import.meta?.env?.DEV ? '/' : PROD_BASE;
}

axios.defaults.baseURL = baseURL;

// Ensure axios sends the X-XSRF-TOKEN header from the XSRF-TOKEN cookie
axios.defaults.xsrfCookieName = 'XSRF-TOKEN';
axios.defaults.xsrfHeaderName = 'X-XSRF-TOKEN';

export default axios;
