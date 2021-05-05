module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
      screens: {
        sm: "640px",
        md: "768px",
        lg: "1024px",
        xl: "1330px",
        xxl: "1500px"
      },
      fontFamily: {
        'Ubuntu': ["Ubuntu", "sans-serif"],
      },
      extend: {
        textColor: {
          brown: '#696352'
        },
        backgroundColor: {
          main: '#F2EFE4',
          header: '#FAF7EC',
          grey: '#F2F2F2',
          activeGreen: '#E0FFED'
        }
      },
    },
    plugins: [
      function({ addComponents }) {
        addComponents({
          ".container": {
            width: "100%",
            maxWidth: "100%",
            paddingLeft: "1rem",
            paddingRight: "1rem",
            "@screen lg": {
              paddingLeft: "7.5rem",
              paddingRight: "7.5rem"
            },
            "@screen xxl": {
              paddingLeft: "7.5rem",
              paddingRight: "7.5rem"
            }
          }
        });
      }],
}
