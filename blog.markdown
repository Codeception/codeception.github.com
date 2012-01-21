---
layout: page
title: Codeception Blog
---

# Blog

{% for post in site.posts %}

### [{{ post.title }}]({{ post.url }})

#### {{ post.date |format_date }}

{{ post.content | truncate: 450 }}


{% endfor %}