#!/usr/bin/env ruby
require 'cgi'
cgi = CGI.new

city = cgi['city'].capitalize
province = cgi['province'].capitalize
country = cgi['country'].capitalize
image_url = cgi['image_url']

puts "Content-Type: text/html\n\n"
puts <<~HTML
<!DOCTYPE html>
<html>
<head>
    <title>#{city}, #{country}</title>
</head>
<body style="text-align:center; background-color:lightblue;">
    <h1 style="color:white; background-color:darkblue;">#{city}, #{country}</h1>
    <img src="#{image_url}" style="width:100%; height:auto;">
</body>
</html>
HTML
