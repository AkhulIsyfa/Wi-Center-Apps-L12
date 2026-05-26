const defaultTheme = require("tailwindcss/defaultTheme");
const fs = require("fs");
const path = require("path");

const filamentPresetPath = [
  "./vendor/filament/support/tailwind.config.preset",
  "../../../../vendor/filament/support/tailwind.config.preset",
].find((presetPath) => fs.existsSync(path.resolve(__dirname, presetPath)));

if (!filamentPresetPath) {
  throw new Error(
    "Filament Tailwind preset not found. Place this file in the Laravel root or resources/css/filament/admin.",
  );
}

const filamentPreset = require(filamentPresetPath);

module.exports = {
  darkMode: "class",
  presets: [filamentPreset],
  content: [
    "./app/Filament/**/*.php",
    "./app/Livewire/**/*.php",
    "./resources/views/**/*.blade.php",
    "./resources/js/**/*.js",
    "./vendor/filament/**/*.blade.php",
    "./*.html",
  ],
  theme: {
    extend: {
      colors: {
        "on-primary": "#ffffff",
        "on-error-container": "#93000a",
        "primary-fixed": "#dce1ff",
        "on-primary-container": "#90a8ff",
        primary: "#00236f",
        "secondary-fixed-dim": "#4edea3",
        "inverse-surface": "#213145",
        "inverse-on-surface": "#eaf1ff",
        background: "#f8f9ff",
        "error-container": "#ffdad6",
        "surface-container-lowest": "#ffffff",
        "on-tertiary-container": "#82abff",
        "on-tertiary-fixed-variant": "#004395",
        tertiary: "#00285e",
        "on-secondary-container": "#00714d",
        "surface-container-low": "#eff4ff",
        "outline-variant": "#c5c5d3",
        "primary-fixed-dim": "#b6c4ff",
        error: "#ba1a1a",
        "on-surface": "#0b1c30",
        "surface-dim": "#cbdbf5",
        "on-secondary-fixed-variant": "#005236",
        outline: "#757682",
        "on-tertiary-fixed": "#001a42",
        "on-background": "#0b1c30",
        secondary: "#006c49",
        "surface-container-highest": "#d3e4fe",
        "secondary-fixed": "#6ffbbe",
        "surface-tint": "#4059aa",
        "on-secondary": "#ffffff",
        "on-surface-variant": "#444651",
        "tertiary-fixed-dim": "#adc6ff",
        "tertiary-fixed": "#d8e2ff",
        "primary-container": "#1e3a8a",
        "on-primary-fixed": "#00164e",
        "on-tertiary": "#ffffff",
        "surface-variant": "#d3e4fe",
        "tertiary-container": "#003d88",
        "surface-bright": "#f8f9ff",
        "inverse-primary": "#b6c4ff",
        "on-error": "#ffffff",
        surface: "#f8f9ff",
        "on-primary-fixed-variant": "#264191",
        "on-secondary-fixed": "#002113",
        "surface-container": "#e5eeff",
        "secondary-container": "#6cf8bb",
        "surface-container-high": "#dce9ff",
      },
      borderRadius: {
        DEFAULT: "0.25rem",
        lg: "0.5rem",
        xl: "0.75rem",
        full: "9999px",
      },
      spacing: {
        "margin-mobile": "16px",
        "topbar-height": "72px",
        gutter: "24px",
        "sidebar-collapsed": "80px",
        "margin-desktop": "32px",
        "sidebar-width": "260px",
        "base-unit": "8px",
      },
      fontFamily: {
        sans: ["Inter", ...defaultTheme.fontFamily.sans],
        "headline-sm": ["Inter", ...defaultTheme.fontFamily.sans],
        "body-md": ["Inter", ...defaultTheme.fontFamily.sans],
        "headline-md": ["Inter", ...defaultTheme.fontFamily.sans],
        "body-lg": ["Inter", ...defaultTheme.fontFamily.sans],
        "display-lg": ["Inter", ...defaultTheme.fontFamily.sans],
        "headline-lg": ["Inter", ...defaultTheme.fontFamily.sans],
        "label-md": ["Inter", ...defaultTheme.fontFamily.sans],
        "label-sm": ["Inter", ...defaultTheme.fontFamily.sans],
      },
      fontSize: {
        "headline-sm": ["20px", { lineHeight: "28px", fontWeight: "600" }],
        "body-md": ["16px", { lineHeight: "24px", fontWeight: "400" }],
        "headline-md": ["24px", { lineHeight: "32px", fontWeight: "600" }],
        "body-lg": ["18px", { lineHeight: "28px", fontWeight: "400" }],
        "display-lg": [
          "48px",
          {
            lineHeight: "56px",
            letterSpacing: "-0.02em",
            fontWeight: "700",
          },
        ],
        "headline-lg": ["32px", { lineHeight: "40px", fontWeight: "600" }],
        "label-md": [
          "14px",
          {
            lineHeight: "20px",
            letterSpacing: "0.01em",
            fontWeight: "500",
          },
        ],
        "label-sm": [
          "12px",
          {
            lineHeight: "16px",
            letterSpacing: "0.05em",
            fontWeight: "600",
          },
        ],
      },
      boxShadow: {
        "wi-card": "0 4px 20px -5px rgba(30, 58, 138, 0.08)",
      },
    },
  },
};
