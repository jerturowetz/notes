# Cheat sheet: globs

## Match everything in the `css` folder with the `css` extensions

    css/*.css

## Match everything in the `css` folder & all subfolders with the `css` extensions

    css/**/*.css

## Exclude the `style.css` file in the `css` folder

    !css/style.css

## Match files in root directory with either `.js` or `.css` extensions

    *.+(js|css)

## Match all `.css` files in the `css` folder, except those starting with `_` (the `^` at the beginning of a character set means _not_)

    `css/[^_]*.css`

## Further reading

- [Glob](https://github.com/isaacs/node-glob)
- [minimatch](https://github.com/isaacs/minimatch)
