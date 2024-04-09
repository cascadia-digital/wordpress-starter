// /** @type {import('tailwindcss').Config} */
const colors = require("tailwindcss/colors");

export default {
    content: [
        "./*.php",
		"./includes/**/*.php",
		"./acf-blocks/**/*.php",
		"./partials/**/*.php",
		"./template-parts/**/*.php",
		"./assets/js/**/*.js",
    ],

    theme: {
        container: {
            center: true,
            padding: '1rem',
        },
        // colors: {
		// 	transparent: "transparent",
		// 	current: "currentColor",
		// 	white: colors.white,
		// 	black: colors.black,
		// },
        fontFamily: {
			whitney: [
				"Whitney SSm A",
				"Whitney SSm B",
				"Whitney Medium",
				'"Helvetica Neue"',
				"Arial",
			],
		},
		fontSize: {
			xs: ["0.8125rem", { lineHeight: "1rem" }], // 13px
			sm: ["0.9375rem", { lineHeight: "1.25rem" }], // 15px
			base: ["1rem", { lineHeight: "1.5rem", letterSpacing: "-0.01rem" }], // 16px
			lg: ["1.125rem", { lineHeight: "1.75rem" }], // 18px
			xl: ["1.25rem", { lineHeight: "1.75rem" }], // 20px
			"2xl": ["1.5rem", { lineHeight: "2rem" }], // 24px
			"3xl": ["1.75rem", { lineHeight: "2.25rem" }], // 28px
			"4xl": ["2rem", { lineHeight: "2.5rem" }], // 32px
			"5xl": ["2.5rem", { lineHeight: "1.25", letterSpacing: "-1px" }], // 40px
			"6xl": ["3.75rem", { lineHeight: "1" }], // 60px
			"7xl": ["4.5rem", { lineHeight: "1" }],
			hero: ["4.75rem", { lineHeight: "1.125", letterSpacing: "-3px" }], // 80px
			"8xl": ["6.875rem", { lineHeight: "1", letterSpacing: "-3px" }], // 110px
		},
        extend: {
            colors: {
                transparent: "transparent",
                current: "currentColor",
                white: colors.white,
                black: colors.black,
            },
        },
    },

    plugins: [
        require('@tailwindcss/typography'),
    ],
};
