// postcss.config.js
module.exports = {
    plugins: [
      require('tailwindcss')('./tailwind.config.js'), // Specify path to your Tailwind CSS configuration file
      require('autoprefixer'),
    ]
  }
