
/** phones indexes **/
db.getCollection("phones").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** phones records **/
db.getCollection("phones").insert({
  "_id": ObjectId("534ceeaded42c764238b4567"),
  "name": "Motorola XOOM with Wi-Fi",
  "snippet": "The Next, Next Generation Experience the future with Motorola XOOM with Wi-Fi, the world's first tablet powered by Android 3.0 (Honeycomb).",
  "description": "Motorola XOOM with Wi-Fi has a super-powerful dual-core processor and Android 3.0 (Honeycomb) the Android platform designed specifically for tablets. With its 10.1-inch HD widescreen display, you'll enjoy HD video in a thin, light, powerful and upgradeable tablet.",
  "images": "motorola-xoom-with-wi-fi.5.jpg,motorola-xoom-with-wi-fi.4.jpg,motorola-xoom-with-wi-fi.3.jpg,motorola-xoom-with-wi-fi.2.jpg,motorola-xoom-with-wi-fi.1.jpg,motorola-xoom-with-wi-fi.0.jpg",
  "phone_id": "motorola-xoom-with-wi-fi",
  "age": NumberInt(1)
});
db.getCollection("phones").insert({
  "_id": ObjectId("534e2047ed42c77a118b4567"),
  "name": "MOTOROLA XOOM",
  "snippet": "The Next, Next Generation Experience the future with MOTOROLA XOOM, the world's first tablet powered by Android 3.0 (Honeycomb).",
  "description": "MOTOROLA XOOM has a super-powerful dual-core processor and Android 2 3.0 (Honeycomb)  the Android platform designed specifically for tablets. With its 10.1-inch HD widescreen display, you ll enjoy HD video in a thin, light, powerful and upgradeable tablet.",
  "images": "motorola-xoom.2.jpg,motorola-xoom.1.jpg,motorola-xoom.0.jpg",
  "phone_id": "motorola-xoom",
  "age": NumberInt(2)
});
db.getCollection("phones").insert({
  "_id": ObjectId("534e20b6ed42c7d40b8b4567"),
  "name": "MOTOROLA ATRIX 4G",
  "snippet": "MOTOROLA ATRIX 4G the world's most powerful smartphone.",
  "description": "MOTOROLA ATRIX 4G gives you dual-core processing power and the revolutionary webtop application. With webtop and a compatible Motorola docking station, sold separately, you can surf the Internet with a full Firefox browser, create and edit docs, or access multimedia on a large screen almost anywhere.",
  "images": "motorola-atrix-4g.3.jpg,motorola-atrix-4g.2.jpg,motorola-atrix-4g.1.jpg,motorola-atrix-4g.0.jpg",
  "phone_id": "motorola-atrix-4g",
  "age": NumberInt(3)
});
db.getCollection("phones").insert({
  "_id": ObjectId("534e2108ed42c7a7118b4567"),
  "name": "Dell Streak 7",
  "snippet": "Introducing Dell Streak 7. Share photos, videos and movies together. Its small enough to carry around, big enough to gather around.",
  "description": "Introducing Dell Streak 7. Share photos, videos and movies together. Its small enough to carry around, big enough to gather around. Android 2.2-based tablet with over-the-air upgrade capability for future OS releases.  A vibrant 7-inch, multitouch display with full Adobe Flash 10.1 pre-installed.  Includes a 1.3 MP front-facing camera for face-to-face chats on popular services such as Qik or Skype.  16 GB of internal storage, plus Wi-Fi, Bluetooth and built-in GPS keeps you in touch with the world around you.  Connect on your terms. Save with 2-year contract or flexibility with prepaid pay-as-you-go plans",
  "images": "dell-streak-7.4.jpg,dell-streak-7.3.jpg,dell-streak-7.2.jpg,dell-streak-7.1.jpg,dell-streak-7.0.jpg",
  "phone_id": "dell-streak-7",
  "age": NumberInt(4)
});
db.getCollection("phones").insert({
  "_id": ObjectId("534e2156ed42c746128b4567"),
  "name": "Samsung Gem",
  "snippet": "The Samsung Gem brings you everything that you would expect and more from a touch display smart phone  more apps, more features and a more affordable price.",
  "description": "The Samsung Gem maps a route to a smarter mobile experience. By pairing one of the fastest processors in the category with the Android platform, the Gem delivers maximum multitasking speed and social networking capabilities to let you explore new territory online. A smart phone at an even smarter price is a real find, so uncover the Gem and discover what next.",
  "images": "samsung-gem.2.jpg,samsung-gem.1.jpg,samsung-gem.0.jpg",
  "phone_id": "samsung-gem",
  "age": NumberInt(5)
});
db.getCollection("phones").insert({
  "_id": ObjectId("534e23cfed42c7a7118b4568"),
  "name": "DROID Pro by Motorola",
  "snippet": "The next generation of DOES.",
  "description": "With Quad Band GSM, the DROID 2 Global can send email and make and receive calls from more than 200 countries. It features an improved QWERTY keyboard, super-fast 1.2 GHz processor and enhanced security for all your business needs.",
  "images": "droid-pro-by-motorola.1.jpg,droid-pro-by-motorola.0.jpg",
  "phone_id": "droid-pro-by-motorola",
  "age": NumberInt(12)
});
db.getCollection("phones").insert({
  "_id": ObjectId("534e2199ed42c77d0c8b4567"),
  "name": "Dell Venue",
  "snippet": "The Dell Venue; Your Personal Express Lane to Everything",
  "description": "The Venue is the perfect one-touch, Smart Phone providing instant access to everything you love. All of Venue's features make it perfect for on-the-go students, mobile professionals, and active social communicators who love style and performance.Elegantly designed, the Venue offers a vibrant, curved glass display thats perfect for viewing all types of content. The Venues slender form factor feels great in your hand and also slips easily into your pocket.  A mobile entertainment powerhouse that lets you download the latest tunes from Amazon MP3 or books from Kindle, watch video, or stream your favorite radio stations.  All on the go, anytime, anywhere.",
  "images": "dell-venue.5.jpg,dell-venue.4.jpg,dell-venue.3.jpg,dell-venue.2.jpg,dell-venue.1.jpg,dell-venue.0.jpg",
  "phone_id": "dell-venue",
  "age": NumberInt(6)
});
db.getCollection("phones").insert({
  "_id": ObjectId("534e220aed42c79b118b4567"),
  "name": "Nexus S",
  "snippet": "Fast just got faster with Nexus S. A pure Google experience, Nexus S is the first phone to run Gingerbread (Android 2.3), the fastest version of Android yet.",
  "description": "Nexus S is the next generation of Nexus devices, co-developed by Google and Samsung. The latest Android platform (Gingerbread), paired with a 1 GHz Hummingbird processor and 16GB of memory, makes Nexus S one of the fastest phones on the market. It comes pre-installed with the best of Google apps and enabled with new and popular features like true multi-tasking, Wi-Fi hotspot, Internet Calling, NFC support, and full web browsing. With this device, users will also be the first to receive software upgrades and new Google mobile apps as soon as they become available. For more details, visit http:\/\/www.google.com\/nexus.",
  "images": "nexus-s.3.jpg,nexus-s.2.jpg,nexus-s.1.jpg,nexus-s.0.jpg",
  "phone_id": "nexus-s",
  "age": NumberInt(7)
});
db.getCollection("phones").insert({
  "_id": ObjectId("534e224fed42c7af128b4567"),
  "name": "LG Axis",
  "snippet": "Android Powered, Google Maps Navigation, 5 Customizable Home Screens",
  "description": "Android plus QWERTY is a powerful duo. LG Axis melds a speedy UI with the limitless micro-entertainment of 80,000+ apps including voice-activated Google. Feel the tactile vibration on its tempered glass touchscreen. Take the fuzziness out of your fun with a 3.2MP camera that does 360 panoramics. And customize your home screens with shortcuts to your apps, favorites, and widgets. It's the centerpiece of your life.",
  "images": "lg-axis.2.jpg,lg-axis.1.jpg,lg-axis.0.jpg",
  "phone_id": "lg-axis",
  "age": NumberInt(8)
});
db.getCollection("phones").insert({
  "_id": ObjectId("534e22a4ed42c7c0128b4567"),
  "name": "Samsung Galaxy Tab",
  "snippet": "Feel Free to Tab. The Samsung Galaxy Tab brings you an ultra-mobile entertainment experience through its 7 display, high-power processor and Adobe Flash Player compatibility.",
  "description": "Feel Free to Tab. The Samsung Galaxy Tab, the tablet device that delivers enhanced capabilities with advanced mobility, has a large, perfectly sized, 7.0\\\" screen that offers plenty of room for the thousands of interactive games and apps available for the Android platform, and its slim design makes it perfect for travel and one-handed grip. Use the Galaxy Tab to relax and enjoy an e-book, watch rich video or full web content with its Adobe Flash Player compatibility, video chat using the front-facing camera, or send user-generated content wirelessly to other devices like your TV via All Share.  With so many options for customization and interactivity, the Galaxy Tab gives you everything you want, anywhere you go Feel Free to Tab.",
  "images": "samsung-galaxy-tab.6.jpg,samsung-galaxy-tab.5.jpg,samsung-galaxy-tab.4.jpg,samsung-galaxy-tab.3.jpg,samsung-galaxy-tab.2.jpg,samsung-galaxy-tab.1.jpg,samsung-galaxy-tab.0.jpg",
  "phone_id": "samsung-galaxy-tab",
  "age": NumberInt(9)
});
db.getCollection("phones").insert({
  "_id": ObjectId("534e2337ed42c7af128b4568"),
  "name": "Samsung Showcase a Galaxy S phone",
  "snippet": "The Samsung Showcase delivers a cinema quality experience like you've never seen before. Its innovative 4' touch display technology provides rich picture brilliance, even outdoors",
  "description": "Experience entertainment in a whole new light. The stylish and slim Samsung Mesmerize, with its vivid 4-inch Super AMOLED display, makes everything from Hollywood blockbusters to music videos to Amazon's bestsellers look absolutely brilliant even outside in the sun. Android Market rockets you into a universe filled with equally brilliant apps; download them at blistering speeds thanks to the powerful 1GHz Hummingbird processor. Keep your social life organized and continuously updated with the pre-loaded social networking apps, while uploading all the 5.0MP pics you've snapped and 720p HD videos you've recorded.",
  "images": "samsung-showcase-a-galaxy-s-phone.2.jpg,samsung-showcase-a-galaxy-s-phone.1.jpg,samsung-showcase-a-galaxy-s-phone.0.jpg",
  "phone_id": "samsung-showcase-a-galaxy-s-phone",
  "age": NumberInt(10)
});
db.getCollection("phones").insert({
  "_id": ObjectId("534e238ced42c7fe128b4567"),
  "name": "DROID 2 Global by Motorola",
  "snippet": "The first smartphone with a 1.2 GHz processor and global capabilities.",
  "description": "Access your work directory, email or calendar with DROID Pro by Motorola., an Android-for-business smartphone with corporate-level security. It features both a QWERTY keyboard and touchscreen, a speedy 1 GHz processor and Adobe Flash Player 10.",
  "images": "droid-2-global-by-motorola.2.jpg,droid-2-global-by-motorola.1.jpg,droid-2-global-by-motorola.0.jpg",
  "phone_id": "droid-2-global-by-motorola",
  "age": NumberInt(11)
});
db.getCollection("phones").insert({
  "_id": ObjectId("534e246fed42c733138b4567"),
  "name": "MOTOROLA BRAVO with MOTOBLUR",
  "snippet": "An experience to cheer about.",
  "description": "MOTOROLA BRAVO with MOTOBLUR with its large 3.7-inch touchscreen and web-browsing capabilities is sure to make an impression.  And it keeps your life updated and secure through MOTOBLUR.",
  "images": "motorola-bravo-with-motoblur.2.jpg,motorola-bravo-with-motoblur.1.jpg,motorola-bravo-with-motoblur.0.jpg",
  "phone_id": "motorola-bravo-with-motoblur",
  "age": NumberInt(13)
});
db.getCollection("phones").insert({
  "_id": ObjectId("534e24c4ed42c74a118b4567"),
  "name": "Motorola DEFY with MOTOBLUR",
  "snippet": "Are you ready for everything life throws your way?",
  "description": "DEFY with MOTOBLUR is ready for everything life throws your way. It's water-resistant and dustproof, with plenty of entertainment options; and, with MOTOBLUR, it automatically delivers messages and status updates right to your home screen.",
  "images": "motorola-defy-with-motoblur.2.jpg,motorola-defy-with-motoblur.1.jpg,motorola-defy-with-motoblur.0.jpg",
  "phone_id": "motorola-defy-with-motoblur",
  "age": NumberInt(14)
});
db.getCollection("phones").insert({
  "_id": ObjectId("534e2501ed42c72c138b4567"),
  "name": "T-Mobile myTouch 4G",
  "snippet": "The T-Mobile myTouch 4G is a premium smartphone designed to deliver blazing fast 4G speeds so that you can video chat from practically anywhere, with or without Wi-Fi.",
  "description": "The myTouch 4G lets you connect fast, communicate easily, and share all on America's largest 4G network.Built with families in mind, the newest T-Mobile myTouch 4G helps solve the challenges of staying physically and emotionally connected by sharing photos and video with the HD Camcorder, spontaneous face-to-face conversations through Video Chat, and the ability to reach 4G speeds on T-Mobile's HSPA+ network.",
  "images": "t-mobile-mytouch-4g.5.jpg,t-mobile-mytouch-4g.4.jpg,t-mobile-mytouch-4g.3.jpg,t-mobile-mytouch-4g.2.jpg,t-mobile-mytouch-4g.1.jpg,t-mobile-mytouch-4g.0.jpg",
  "phone_id": "t-mobile-mytouch-4g",
  "age": NumberInt(15)
});
db.getCollection("phones").insert({
  "_id": ObjectId("534e255aed42c722138b4567"),
  "name": "Samsung Mesmerize a Galaxy S phone",
  "snippet": "The Samsung Mesmerize delivers a cinema quality experience like you've never seen before. Its innovative 4d touch display technology provides rich picture brilliance,even outdoors",
  "description": "Experience entertainment in a whole new light. The stylish and slim Samsung Mesmerize, with its vivid 4-inch Super AMOLED display, makes everything from Hollywood blockbusters to music videos to Amazon's bestsellers look absolutely brilliant even outside in the sun. Android Market rockets you into a universe filled with equally brilliant apps; download them at blistering speeds thanks to the powerful 1GHz Hummingbird processor. Keep your social life organized and continuously updated with the pre-loaded social networking apps, while uploading all the 5.0MP pics you've snapped and 720p HD videos you've recorded.",
  "images": "samsung-mesmerize-a-galaxy-s-phone.3.jpg,samsung-mesmerize-a-galaxy-s-phone.2.jpg,samsung-mesmerize-a-galaxy-s-phone.1.jpg,samsung-mesmerize-a-galaxy-s-phone.0.jpg",
  "phone_id": "samsung-mesmerize-a-galaxy-s-phone",
  "age": NumberInt(16)
});
db.getCollection("phones").insert({
  "_id": ObjectId("534e259aed42c722138b4568"),
  "name": "SANYO ZIO",
  "snippet": "The Sanyo Zio by Kyocera is an Android smartphone with a combination of ultra-sleek styling, strong performance and unprecedented value.",
  "description": "Zio uses CDMA2000 1xEV-DO rev. A and Wi-Fi technologies and features a 3.5-inch WVGA touch-screen display as a backdrop for a fully customizable mobile multimedia experience.  Along with the touch-screen, a trackball helps users navigate features such as the 3.2 MP camera with video record\/playback, media player and full HTML Web browser.  Zio supports up to 32GB through its external microSD memory slot.",
  "images": "sanyo-zio.2.jpg,sanyo-zio.1.jpg,sanyo-zio.0.jpg",
  "phone_id": "sanyo-zio",
  "age": NumberInt(17)
});
db.getCollection("phones").insert({
  "_id": ObjectId("534e261ced42c727138b4567"),
  "name": "Samsung Transform",
  "snippet": "The Samsung Transform brings you a fun way to customize your Android powered touch screen phone to just the way you like it through your favorite themed Sprint ID Service Pack.",
  "description": "Change your perspective.  The Samsung Transform is an Android powered device that delivers the truly customizable experience you want your phone to provide.  Enjoy a new and easy way to personalize your device for business or for entertainment, showcasing your own favorite theme and more through the new open software platform and the ability to download individual Sprint ID Service Packs that combine and deliver multiple content items and applications specifically for the features you want.  Combine this with the 3.5 touch display, QWERTY keyboard, high-speed processor, and both a front and rear facing camera to bring your unique mobile experience to life.",
  "images": "samsung-transform.4.jpg,samsung-transform.3.jpg,samsung-transform.2.jpg,samsung-transform.1.jpg,samsung-transform.0.jpg",
  "phone_id": "samsung-transform",
  "age": NumberInt(18)
});
db.getCollection("phones").insert({
  "_id": ObjectId("534e2652ed42c74a118b4568"),
  "age": NumberLong(19),
  "description": "The T-Mobile G1 was the world's first Android-powered phone. Launched nearly two years ago, it created an entirely new class of mobile phones and apps. Its successor, the T-Mobile G2 with Google, will continue the revolution.\\n\\nThe T-Mobile G2 will deliver tight integration with Google services and break new ground as the first smartphone designed to run at 4G speeds on our new HSPA+ network.",
  "images": "t-mobile-g2.2.jpg,t-mobile-g2.1.jpg,t-mobile-g2.0.jpg",
  "name": "T-Mobile G2",
  "phone_id": "t-mobile-g2",
  "snippet": "The T-Mobile G2 with Google is the first smartphone built for 4G speeds on T-Mobile's new network. Get the information you need, faster than you ever thought possible."
});
db.getCollection("phones").insert({
  "_id": ObjectId("534e26fbed42c78c138b4567"),
  "name": "Motorola CHARM with MOTOBLUR",
  "snippet": "Motorola CHARM fits easily in your pocket or palm.  Includes MOTOBLUR service.",
  "description": "Motorola CHARM fits easily in your pocket or palm. Includes MOTOBLUR so you can sync and merge your contacts, emails, messages and posts with continuous updates and back-ups.",
  "images": "motorola-charm-with-motoblur.2.jpg,motorola-charm-with-motoblur.1.jpg,motorola-charm-with-motoblur.0.jpg",
  "phone_id": "motorola-charm-with-motoblur",
  "age": NumberInt(20)
});

/** system.indexes records **/
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "phone_list.phones",
  "name": "_id_"
});
