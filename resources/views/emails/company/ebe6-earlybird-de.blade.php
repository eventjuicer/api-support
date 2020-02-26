

@component('mail::message')

# Hi {{$profile->translate("[[fname]]")}},

die E-commerce Berlin Expo 2020 gehört der Vergangenheit an, jedoch laufen die Vorbereitungen für die Expo 2021 auf Hochtouren. 
Wir möchten dich darüber informieren, dass am kommenden Mittwoch, **den 04.03.2020, ab 12 Uhr**, der Vorverkauf für die anstehende Expo beginnt. 

 
# Was sind die Vorteile? 

* Zugang zu den Topflächen zum günstigsten Preis 
* Sichere dir die Toplocation 
* sichere dir den Topplatz vor der Konkurrenz 

Die Preise beginnen ab 2500€ für 9m2 bis zu 5200€ für 18m2. 

Der nachfolgende Link bringt euch zur Bookingseite. Dort werdet ihr die Preise sehen. 

@component(‘mail::button’, [‘url’ => “https://pages.ecommerceberlin.com/exhibit”])
Check the map here
@endcomponent

**WICHTIG!**
Bitte beachte, dass der Vorverkauf bis zum 31.03.20 offen ist. Danach werden die Preise steigen und du wirst nicht mehr die Möglichkeit haben, die Standfläche zu den oben genannten Konditionen zu bekommen. 

Mit freundlichen Grüßen,

Lucas Zarna 

@endcomponent



