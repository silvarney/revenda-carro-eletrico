jQuery(document).ready(function($) {
"use strict";

// Smooth scroll
$("a[href*=\"#\"]").on("click", function(e) {
if (this.hash !== "") {
const hash = this.hash;
const target = $(hash);

if (target.length) {
e.preventDefault();
$("html, body").animate({
scrollTop: target.offset().top - 80
}, 800);
}
}
});

// Notificação simples
function showNotification(message, type = "success") {
const notification = $("<div class=\"notification notification-" + type + "\">" + message + "</div>");
$("body").append(notification);

setTimeout(function() {
notification.addClass("show");
}, 100);

setTimeout(function() {
notification.removeClass("show");
setTimeout(function() {
notification.remove();
}, 300);
}, 3000);
}

// Back to top
const backToTop = $("<button class=\"back-to-top\" title=\"Voltar ao topo\">↑</button>");
$("body").append(backToTop);

$(window).on("scroll", function() {
if ($(window).scrollTop() > 300) {
backToTop.addClass("show");
} else {
backToTop.removeClass("show");
}
});

backToTop.on("click", function() {
$("html, body").animate({ scrollTop: 0 }, 600);
});
});
