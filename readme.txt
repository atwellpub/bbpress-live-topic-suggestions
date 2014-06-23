=== bbPress Live Topic Suggestions  ===

Contributors: adbox, japh
Donate link: hudson.atwell@gmail.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: bbpress, live search, auto-suggest, topics
Requires at least: 3.8
Tested up to: 3.9
Stable Tag: 1.0.7

Auto suggest related topics based on user's new topic title. Uses a combination of tag regongnition & title string searches to return results. For best results please use with an auto-tagging plugin.

== Description ==

We developed this tool for our bbPress support forms over at [InboundNow](http://www.inboundnow.com "Inbound Marketing for WordPress"). Our goal was to reduce the custom support load by suggesting related topics to the user as they constucted their new topic title. 

Mission accomplished. 


= Developers & Designers =

This extension has a plubic GitHub page where users can contribute fixes and improvements. We ask that if you do make improvements that you commit them back for review so everyone can benefit. 

[Follow Development on GitHub ](https://github.com/atwellpub/bbpress-live-topic-suggestions "Follow & Contribute to core development on GitHub")
 | 
[Follow Developer on Twitter ](https://twitter.com/atwellpub "Follow the developer on Twitter" )


== Installation ==

1. Upload `bbpress-live-suggest-topics` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==
* Do you provide free support for this plugin

No. But we have a public github and we do offer paid support. Contact the plugin developer to commission your work. 

* Does this extension work with the default topic search?

No. We would love to see a drop down live search for bbpress integrated with this plugin. Contact the plugin developer to commission it! 

== Screenshots ==

1. Example of auto-suggested topics.

== Changelog ==

= 1.0.8 =

* Removed use of transients. Sites running older versions of this plugin should delete all their transients, they are ineffective and autoloading causing unneccecary backend strain. I used the plugin WP Optimize to delete my transients.

= 1.0.1 =

Released
