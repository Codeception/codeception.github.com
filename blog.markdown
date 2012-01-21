---
layout: page
title: Codeception Blog
---

<h1>Blog</h1>

{% for post in site.posts %}

<h3><a href="{{ post.url }}">{{ post.title }}</a></h3>


<p>{{ post.content | truncate: 450 }}</p>

<a href="{{ post.url }}">Read more</a>

{% endfor %}