# Cheat sheet : Typography

From Matej Latin's typography lessons

## Type size & colour

- A common rule for setting the body text is to set it to a size that would match the size of the text in a book at an arm's length distance
- 16px for mobile and from 18px to 22px for desktop is a good general rule (this may be different depending on the typeface).
- _Type colour_ means how heavy black type on a light background looks like (independant of weight)

## Line width (measure)

- The ideal width of a line of text is from 45 to 75 characters — including spaces.

## Line-height (leading)

- Too many designers or web developers think of line-height as an isolated text feature, so they tend to set it based on what _seems_ right. Consequently, line-height tends to get set without too much consideration.
- For paragraphs, ideal line-height is usually between 1.3 and 1.6 (a body text set at 16px should have a line-height from 21px to 26px); but will depend on the things mentioned earlier: typeface design, type size, weight etc.
- Headings are usually much shorter so they need to have less space between the lines so they don't look like they're drifting apart. Recommended line-height for headings is from 1 to 1.2 so a heading set at 24px will need a line-height from 24px to 29px. This may seem a bit ridiculous at first but try it. Once you see the difference you can't unsee it. _Note that in languages that use capital letters more than others (German for example), it’s recommended to use a larger line-height._

## X-height and type color

Typefaces with a taller x-height are considered modern and easier to read. _Merriweather_, _Roboto Slab_ and _Freight Text_ are great examples of modern serifed typefaces with a large x-height.

Typefaces with a smaller x-height are considered less modern and classical. Great examples include typefaces like _Garamond_, _Baskerville_ and _Bodoni_.

## Letter-spacing (tracking)

Letter-spacing (tracking in print design) has a massive impact on the legibility of the words so it should be used with caution (or not at all).

> A man who would letterspace lower case would shag sheep
>
> -- <cite>Frederic Goudy</cite>

Because of their larger size, the spacing between the letters in headings and other heavier text can look optically larger than at smaller sizes. In this case, it’s a good idea to slightly reduce the letterspacing (3–5%, not more) to make them more compact and closer to what body type looks like.

    .heading {
        letter-spacing: -0.04em;
    }

Letterspacing can also be useful is when applied to small caps or uppercase text (aside:using uppercase for longer text is a really bad idea, so really only do this for headings). Whenever we have a line of text set in all uppercase or small caps, it’s a good idea to increase the spacing between the letters just a bit (5 to 10% _at most_).

    .heading {
        text-transform: uppercase;
        letter-spacing: 0.1em;
    }

Letterspacing acronyms, and long series of digits is also recommended.

## Justification

*Don't justify text on the web.*

If you must justify then also add hyphenation so that it's not total garbage.

    .justified {
        text-align: justify;
        hyphens: auto;
    }

## Choosing typefaces

- Google fonts hosts a lot of trash
- Typekit makes life easier
- Stick with the classics

## Vertical rythm (line-height pt2)

To establish sa solid vertical rythm, the line-hight of all elemnts should be relative to the base line-height of the text.

EG: with a body font size of 20px and line-height of 30px, a 55px heading would work well with a line-height and margins relative to the base line height.

    body {
        font-size: 20px;
        line-height: 30px;
    }

    p {
        margin-bottom: 30px;
    }

    .headings {
        font-size: 55px;
        line-height: 60px;    // base line-height*2
        margin-top: 90px;     // base line-height*3
        margin-bottom: 30px;  // base line-height
    }

Because we’ll be needing this in most cases it’s easier to assign a default line-height, margin and padding to all elements and deviate from it only when necessary.

    * {
        line-height: 30px;
        margin-top: 0;
        margin-bottom: 30px; // = 1 * 30px
    }

    # I want my lists to have a different margin
    ul, ol {
        margin-bottom: 60px; // = 2 * 30px
    }

> Clarity of meaning and ease of reading always trump the formal restraints of working with grids.
>
> -- <cite>John Kane</cite>

## Matching typefaces

Typekit is the best at this as it has better sorting filters (_x-height_ in particular). That x-height is the same or nearly the same at worst is really important for vertical rythm.
