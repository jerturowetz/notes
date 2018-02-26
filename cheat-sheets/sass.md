# Cheat sheet : sass

A sass docblock:

    /// Slightly lighten a color
    /// @access public
    /// @param {Color} $color - color to tint
    /// @param {Number} $percentage - percentage of `$color` in returned color
    /// @return {Color}
    @function tint($color, $percentage) {
    @return mix($color, white, $percentage);
    }
