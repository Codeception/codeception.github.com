---
layout: page
title: Codeception Blog
---

# Blog

{% for post in site.posts %}

### [{{ post.title }}]({{ post.url }})

#### {{ post.date | date: "%B %d, %Y" }}

{{ post.content | strip_html | truncate: 250 }}


{% endfor %}