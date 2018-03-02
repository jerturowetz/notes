# Cheat sheet : Jekyll

When we run Jekyll’s build process, we can specify which config files we want it to use. If we specify multiple config files, Jekyll will merge the configurations, defaulting to the last specified config if there are conflicts.



## Useful `_config.yml` defaults

    highlighter: rouge
    encoding: utf-8

## Useful `Gemfile` defaults

    gem 'wdm', '~> 0.1.0' if Gem.win_platform?

## Useful commands

_**Note:** sometimes messy gems make it necess to prepend bundle exec to these commands_

    # Create a blank install
    jekyll new My Blog --blank

    # Build functions
    jekyll build
    jekyll build --watch
    jekyll build -w
    jekyll serve
    jekyll serve --watch
    jekyll serve -w


## Liquid template format

{% include file.ext %}

{{ content }}

... which is shown in the screenshot below:
![My helpful screenshot]({{ "/assets/screenshot.jpg" | absolute_url }})


... you can [get the PDF]({{ "/assets/mydoc.pdf" | absolute_url }}) directly.

<ul>
  {% for post in site.posts %}
    <li>
      <a href="{{ post.url }}">{{ post.title }}</a>
    </li>
  {% endfor %}
</ul>


---
layout: page
---

{% for post in site.categories[page.category] %}
    <a href="{{ post.url | absolute_url }}">
      {{ post.title }}
    </a>
{% endfor %}


<ul>
  {% for post in site.posts %}
    <li>
      <a href="{{ post.url }}">{{ post.title }}</a>
      {{ post.excerpt }}
    </li>
  {% endfor %}
</ul>

{{ post.excerpt | remove: '<p>' | remove: '</p>' }}



{% highlight ruby %}
def show
  @widget = Widget(params[:id])
  respond_to do |format|
    format.html # show.html.erb
    format.json { render json: @widget }
  end
end
{% endhighlight %}



## Sample directory structure

.
├── _config.yml
├── _data
|   └── members.yml
├── _drafts
|   ├── begin-with-the-crazy-ideas.md
|   └── on-simplicity-in-technology.md
├── _includes
|   ├── footer.html
|   └── header.html
├── _layouts
|   ├── default.html
|   └── post.html
├── _posts
|   ├── 2007-10-29-why-every-programmer-should-play-nethack.md
|   └── 2009-04-26-barcamp-boston-4-roundup.md
├── _sass
|   ├── _base.scss
|   └── _layout.scss
├── _site
├── .jekyll-metadata
└── index.html # can also be an 'index.md' with valid YAML Frontmatter
