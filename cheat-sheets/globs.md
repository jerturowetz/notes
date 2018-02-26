# Cheat sheet : globs

In computer programming, in particular in a Unix environment, glob patterns specify _sets of filenames_ with wildcard characters.

## Examples

`css/*.css`  
Matches everything in the `css` folder with the `css` extensions

`css/**/*.css`  
Matches everything in the `css` folder & all subfolders with the `css` extensions

`!css/style.css`  
exclude the `style.css` file in the `css` folder

`*.+(js|css)`  
Match files in root directory with either `.js` or `.css` extensions

`css/[^_]*.css`  
Match all `.css` files in the `css` folder, except those starting with `_`. The `^` at the beginning of a character set means _not_.

## Further reading

- [Glob](https://github.com/isaacs/node-glob)
- [minimatch](https://github.com/isaacs/minimatch)
- [Gulp – How To Build And Develop Websites](https://www.smashingmagazine.com/2014/06/building-with-gulp/)
