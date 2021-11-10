const path = require('path');

module.exports = {

  mode: 'development',

  entry: [
    './assets/js/app.js',
    './assets/sass/app.scss'
  ],

  output: {
    filename: 'bundle.min.js',
    path: path.resolve(__dirname, './assets/js/'),
    publicPath: '.'
  },

  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: '../css/main.min.css'
            }
          },
          {
            loader: 'extract-loader'
          },
          {
            loader: 'css-loader'
          },
          {
            loader: 'postcss-loader',
          },
          {
            loader: 'sass-loader'
          },
        ]
      }
    ]
  },

  plugins: [],

};