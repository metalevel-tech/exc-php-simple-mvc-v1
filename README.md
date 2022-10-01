# PHP Model View Controller (MVC)

Read [../master/**README.md**](../master/README.md)

## Install and setup Node.js and NPM

At this stage are deployed few tools that I'm using to transpile and uglify/minify the CSS and JS resources. All of them are available at NPM. Install the latest version of NPM and Node.js on Ubuntu/Debian machine.

```bash
sudo apt install npm
sudo npm install n
sudo n latest
```

Open a new terminal window and check the version.

```bash
node -v
npm -v
```

Initialize the project and fetch the necessary packages. (The following steps are already done. So skip to the next section.)

```bash
npm init
npm i babel-cli babel-core babel-preset-env uglify-js
npm i less less-plugin-clean-css
npm i onchange
```

The above few commands will create `package.json`, install few NPM packages. Once this is done, no new instance you just need to to run the following command and everything will installed and ready to use (a new file `package-lock.json` and directory `node_modules` will appear; the `--save-dev` option is intentionally not used).

```bash
npm install
cp node_modules/less/dist/less.min.js assets/lessc/
```

[`package.json`](package.json) provide few "scrips". You can use them from the CLI in the following way.

```bash
npm run babel     # assets/js/src/*.es6.js -> assets/js/dist/*.es5.js
npm run uglifyjs  # assets/js/dist/*.js    -> assets/js/dist/*.min.js
npm run lessc     # assets/css/src/*.less  -> assets/css/dist/*.min.css
npm run build     # run all commands above
npm run clean     # remove the content of the 'dist/' directories
npm run watch     # run the 'build' command by the help of 'onchange' when the files in 'src/' are changed.
```
