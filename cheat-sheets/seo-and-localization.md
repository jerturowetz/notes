# Cheat sheet: SEO & localization

## A guide mostly for web developers dealing with Canadian & Quebec web properties

Please note that I've omitted information regarding setting locale info via http headers.  As I mostly use 3rd parties to serve websites (WP Engine for example), I can't mess around with servers. If you do have the skill/ability to mess around with your web servers I'd urge you to explore etting http headers as it's a viable method to set language information.

## Brief, on-page SEO guidelines

Following these rules are enough to get you to the 90% factor for on-page SEO:

- seesion ids, url params can cause duplicate content issues, usril rel=canonical helps with this
- All links should be abolute urls
- all links should use one unified version of the domain (http:// https:// no-www, with www.)
- always have a rel=canonical pouiting to that page...
- make sure youre meta descs are good `<meta name="description" content="A page's description, usually one or two sentences."/>`
- title tags
- language attrivutes
- meta name
- meta robots declarations
- good meta descriptions contain keyb=words and a call to action (learn more, Get it now, Try for free)
- Always use absolute URLS
- URLs should be short with two to four keywords in it
- Write about a 60 character engaging title filled with keywords
- Write one sentence meta description - 145 characters or less - which will show up in Google's SERPS
- Body of the page content should use your keyphrase in the first paragraph and a couple more times
- Body of the page should include relevant synonyms (natural writing almost always does this so don't really worry)
- Link out to some high quality resources so Google knows you know what you are talking about
- Make use of lists, subheading & bit-sized paragraphs depending on your audience/subject matter
- Choose two to three social services for which you will provide easy one click sharing (Google, +, Twitter, Facebook, Pinterest, Reddit, Stumbleupon). Do not confuse the reader with too many choices: they will choose none.
- Idealy make the design easy to read
- Add a few appropriate and engaging illustrations with titles, alt tags and your keyword
- Translate your ALT tags bro

## Resources & tools

- Visit Google Webmaster Tools > HTML Improvements
- [Screaming Frog](https://www.screamingfrog.co.uk/seo-spider/)
- [Sitemap HREFLANG tool](https://erudite.agency/hreflang-tool/)
  Simply upload your CSV file and this tool will convert your file into multiple sitemaps as required.
- SEMRush has a site check tool that looks pretty good but it's $99/month - maybe check reddit
- SEOQuake
  Available as a handy chrome plugin
- [Google webmaster blog](https://webmasters.googleblog.com/)
  General knowledge on how to be a good webmaster
- [Google Search Console](https://www.google.com/webmasters/tools/home?hl=en)
  The place to watch your sites and domains and see how people are searching
  There's also a host of testing tools available
- [Isearchfrom](http://isearchfrom.com/)
  Search as users from different locales/countries/devices
- [Google CCTLDs language and reference sheet](https://www.distilled.net/blog/uncategorized/google-cctlds-and-associated-languages-codes-reference-sheet/)
  full list of language codes
- [The hreflang Tags Generator Tool](https://www.aleydasolis.com/english/international-seo-tools/hreflang-tags-generator/)
  for finding appropriate ISO hreflang tags

## Localization for websites

### CC TLDs

Important in international SEO, ccTLDs are the single strongest way to show search engines and users that site content is specifically targeted to a certain country or region — but, importantly, NOT specifically a certain language. When a site uses a ccTLD, Google assumes that site (and all the content on it) is specifically relevant to the geographic area targeted by the ccTLD and should appear on SERPs in that area.

### A note about country & language codes

Be absolutely sure that you are using the correct country and language codes. The value of the hreflang attribute must be in ISO 639-1 format for the language, and in ISO 3166-1 Alpha 2 format for the region. Specifying only the region is not supported. One of the most common mistakes is using "en-uk" to specify English speakers in the United Kingdom. However, the correct hreflang tag for the UK is actually "en-gb."

Using a tool to help/verify is recommended.

Note that while Google and Yandex currently use the hreflang attribute, Bing uses language meta tags instead.

### Embed language metadata in the document

Use the `content-language` meta tag to embed a document location in the `<head>` section of your documents:

    <meta http-equiv="content-language" content="en-us">

The `content` attribute is comprised of a 2-letter ISO 639 language code, followed by a dash and the appropriate ISO 3166 geography code. For example:

- `de-at`: German, Austria
- `de-de`: German, Germany
- `en-us`: English, United States
- `es-ar`: Spanish, Argentina

Alternatively, embed the document location in either the `<html>` or the `<title>` element using the same format:

- `<html lang="en-us">` or `<title lang="en-us">`

Keep in mind that the priority order for these tags is: `<meta>`, `<html>`, `<title>`. In other words, the document location set in the `content-language` meta tag will always supersede the document location indicated in the `<html>` or `<title>` tag. It's best that you use one option, instead of multiple options here.

### Use `hreflang` to specify the same page in other languages

Everey variant should appear on all pages mentioned, inclusing the page you're mentioning.

    <link rel="alternate" href="http://example.com/en-ie" hreflang="en-ie" />
    <link rel="alternate" href="http://example.com/en-ca" hreflang="en-ca" />
    <link rel="alternate" href="http://example.com/en-au" hreflang="en-au" />
    <link rel="alternate" href="http://example.com/en" hreflang="en" />

A few general rules:

- Always use absolute URLs
- Don't create hreflang tags that point to pages that are set to `noindex`
- Don't reference pages that are redirected

#### Multiple locations for the same page

You can use multiple hreflangs on one page if you want to show that the page is for users in more than one country or area. For example, if the page targets people who speak Amharic in both Ethiopia and Eritrea, you can indicate that like this:

    <link rel="alternate" href="example.com" hreflang="am-et" />
    <link rel="alternate" href="example.com" hreflang="am-er" />

#### Use a general attribute

**Check this out:** I'm not sure if this rule is legit but it's from mozcom so I think it is.

Don't forget to include a general hreflang attribute without the region code to catch Amharic speaking searchers in Djibouti or other areas of the world that you want traffic from:

    <link rel="alternate" href="example.com" hreflang="am" />

#### Optionally use `hreflang="x-default"`

For language/country selectors or auto-redirecting homepages, you should add an annotation for the hreflang value "x-default" as well:

    <link rel="alternate" href="http://example.com/en-us" hreflang="en-us" />
    <link rel="alternate" href="http://example.com/" hreflang="x-default" />

#### A few notes about canonical tags

Canonical tags can be self-referential/points to the current URL. If URLs X, Y, and Z are duplicates, and X is the canonical version, it’s ok to put the tag pointing to X on URL X.

Do not use `rel="canonical"` _across_ country or language versions of your site (lang a shouldnt point ot lang b). But you can use it _within_ a country or language version

When using the `hreflang` along with `rel="canonical"` the hreflang tags need to reference self-referential canonical URLs. For example, page A should have a canonical tag pointing to page A AND page B should have a canonical tag pointing to page B. You _do not_ want to canonicalize only one version of a page in a page grouping, as that would interfere with hreflang annotations.

For example, the page http://www.example.com/usa/ the hreflang tags might say:

    <link rel="alternate" hreflang="en-us" href="http://www.example.com/usa/" />
    <link rel="alternate" hreflang="en-ca" href="http://www.example.com/ca/" />

In this case, the canonical tag for this page would be:

    <link rel="Canonical" href="http://www.example.com/usa/" />

On the Canadian page, the hreflang tags would remain the same, but the canonical tag would be:

    <link rel="Canonical" href="http://www.example.com/CA/" />

You can canonicalize across sites if you control more than 1 website

Lastly, dont tag redirected pages as canonical

#### Checking for hreflang errors

In Google Search Console, under the _International Targeting_ there will be data on how many hreflang tags were found and return tag errors will appear here. _"Missing link"_ errors often occur because the href tags dont include a reference to the page itself.

### Use user agent detection & redirection

User agent detection is the process of detecting the device a person is using and delivering content based on the best practices for that device. IP location detection is the practice of detecting the location of a user and delivering content based on what is more relevant for that IP location. If you implement this correctly, there is a good chance you will lower bounce rates, increase conversions and show the user what they are looking for more quickly.

Google supports both HTTP redirection and JavaScript redirects but HTTP is preferred due to load times.

### A Note On Duplicate Content

One issue that comes up a lot in SEO is duplicate content. Basically, if you have duplicate content on your website or share content that is housed on another site, it forces Google to pick the “winner,” if you will, only ranking that page. When it comes to multilingual and multiregional websites, this can become an issue — you will often have multiple versions of the same content for different regions and languages.

The good news is, if you implement the `rel="alternate"` hreflang link element and x-default hreflang annotation correctly, duplicate content should not be an issue. In the past, SEOs would use `rel="canonical"`, block pages with robots.txt, etc. But today, the alternate/x-default is the best option.

### Geotargeting in webmaster tools

- On the Webmaster Tools Home page, click the site you want
- Under Site configuration, click Settings
- In the Geographic target section, select the option you want

Note: if you want to ensure that your site is not associated with any country or region, select Unlisted.

### Use WPML on wordpress sites

WPML does a lot of stuff automatically but there are other concerns.

Use either differnt subdomains (eg `www.website.com` & `fr.website.com`) or subfolders (eg `/en/` & `/fr/`) for each language & locale where applicapbe.

Set the language code and locale information properly (_WPML >> languages_ and click on _edit languages_)... presentl I'm unsure for quebec, my questions are:

Should I specify canadian english? Does it depend on the site? Or should I set this in Google search console as a geotargeting zone.

Default locale - ( en_CA and fr_QC )
Language tag - ( en-CA and fr-QC )

Default locale – ( en_CA and fr_CA )
Language tag – ( en-CA and fr-CA )

## To dos

- Review `rel=author` & `rel=publisher` and how to use them with google plus profiles
- Review how to set up cards
- Review OG data
- Review big guide if possible & see if Bing has a webmaster tools thingy
- Review how to design AMP pages
- Create a website checklist that using tools for analysis, reviewing webmaster tools, implementing cards etc
- is there a similar setting for setting gegraphic target for bing
- Review sitemap gen on wordpress - please note, sitemaps & hreflang tags arent both necessary & google recommends against both
- find a tool to searcch for missing alt tags / broken images
- ALt tags need to be translated
- should do an SEO study on good title tags
- Reiew alt tags in wrdpress for translated iage meta (do alt tags come from the media library or is better practice to manually add??)
- find a tool tocheck for broken links
- code optimization is actually pretty important for faster sites, so things like unifying scripts and css is a big deal
- make a note that page titles are as imprtant as h1 tags and they should be consistent but not identical
- page titles appear in search results, headers are what readers see on your page
- are there any link auditing tools? too many links are bad but so are too few?
- watch out for 302 redirects - over time they can become a problem as canonical/href lang and a 302 confuses te heck out of google
- Make a list of tools & advice to give to marketers (ie SEO Quake)
- [Read this on tile tag optimization](https://www.semrush.com/blog/seoquake-5-keys-to-optimizing-your-title-tags/)
- take a look at search resuls with links in the page desc or below the page desc (like a buy now link)
