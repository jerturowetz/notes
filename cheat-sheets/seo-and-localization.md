# Jer's guide to website SEO & localization

First, off, always use absolute URLS!

## A guide mostly for web developers dealing with Canadian & Quebec web properties

Before we begin please note that I've omitted information regarding setting locvalization via http headers as I mostly use 3rd parties to serve client data (i.e. WPEngine) and, as a result, I can't mess around with servers. If you do have the skill/ability to mess around with your website servers http headers and are taking steps towards seo & localization, I'd urge you to explore this subject as it's probably the best way to set language information.

## Brief, on-page SEO guidelines

Following these rules are enough to get you to the 90% factor for on-page SEO:

- 60 character engaging title filled with keywords
- short URL with two to four keywords in it
- tasty one sentence meta description (145 characters or less) which will show up in Google's SERPS as the short text most of the time
- body of text uses your keyphrase in the first paragraph and a couple more times
- body of text includes relevant synonyms (natural writing almost always does this so you don't really need to worry about it)
- link out to some high quality resources so Google knows you know what you are talking about
- best to structure text in subheadings, lists and bite size paragraphs but implementation of this rule partly depends on audience/subject matter
- choose two to three social services for which you will provide easy one click sharing (Google, +, Twitter, Facebook, Pinterest, Reddit, Stumbleupon). Do not confuse the reader with too many choices: they will choose none
- attractive easy to read design
- a few appropriate and engaging illustrations with titles which include your keyword

## Resources & tools

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

### A note about country & language codes

Be absolutely sure that you are using the correct country and language codes. The value of the hreflang attribute must be in ISO 639-1 format for the language, and in ISO 3166-1 Alpha 2 format for the region. Specifying only the region is not supported. One of the most common mistakes is using "en-uk" to specify English speakers in the United Kingdom. However, the correct hreflang tag for the UK is actually "en-gb."

Using a tool to help/verify is recommended.

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

**Note:** ALWAYS USE ABSOLUTE URLS

#### Optionally use `hreflang="x-default"`

For language/country selectors or auto-redirecting homepages, you should add an annotation for the hreflang value "x-default" as well:

    <link rel="alternate" href="http://example.com/en-us" hreflang="en-us" />
    <link rel="alternate" href="http://example.com/" hreflang="x-default" />

#### A note about canonical tags

The `hreflang` tag also can be used along with `rel="canonical"` annotations, but hreflang tags need to reference self-referential canonical URLs. For example, page A should have a canonical tag pointing to page A AND page B should have a canonical tag pointing to page B. You _do not_ want to canonicalize only one version of a page in a page grouping, as that would interfere with hreflang annotations.

For example, the page http://www.example.com/usa/ the hreflang tags might say:

    <link rel="alternate" hreflang="en-us" href="http://www.example.com/usa/" />
    <link rel="alternate" hreflang="en-ca" href="http://www.example.com/ca/" />

In this case, the canonical tag for this page would be:

    <link rel="Canonical" href="http://www.example.com/usa/" />

On the Canadian page, the hreflang tags would remain the same, but the canonical tag would be:

    <link rel="Canonical" href="http://www.example.com/CA/" />

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
