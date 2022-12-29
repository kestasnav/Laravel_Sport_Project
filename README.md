# Įgyvendintos funkcijos:

<li> Straipsnių redagavimas, ištrinimas, pridėjimas, paslėpimas nuo vartotojų.
<li> Komentarų trynimas.
<li> Produktų ir jų kategorijų kūrimas, redagavimas, ištrinimas.
<li> Užsakymų trinimas, statusų keitimas.
<li> Super administratorius gali keisti vartotojų roles į administratorių ir paprastą vartotoją.
<li> Vartotojas gali rašyti komentarus, ištrinti savo parašytą komentarą, 'like`inti' ir 'atlike`inti' komentarus.
<li> Vartotojas gali redaguoti savo profilį.
<li> Vartotojas gali įsidėti prekes į krepšelį.
<li> Vartotojas gali atlikti apmokėjimą kreditine kortele už prekes (įdiegta Stripe payment sistema).
<li> Po apmokėto užsakymo išsiunčiamas el. laiškas su užsakymo informacija.
<li> Po įvykdyto užsakymo, iš produktų lentelės nuo produkto nusirašo kiekis, kuris buvo užsakytas.
<li> Kitos funkcijos:
<li> Privaloma patvirtinti el. paštą po registracijos.
<li> Rūšiuoti naujienas pagal naujumą ir skaitomumą.
<li> Komentarai išrikiuoti pagal populiarumą (like`ų skaičių).
<li> Atlikti paiešką pagal raktinį žodį straipsnio pavadinime, bei pačiame straipsnyje.
<li> Straipsniai suskirstyti į kategorijas ( krepšinis, futbolas ), bei subkategorijas ( eurolyga, nba, pasaulio čempionatas, anglijos premier lyga ir kt.)
<li> Puslapio meniu punktai turi dvikalbiškumą (LT, EN).
<li> Iš API gaunami NBA tvarkaraščio duomenys.


 <hr>

# Toliau pateikiu keletą ekranvaizdžių:
# Admin dashboard:
# Posts:
# ![screencapture-localhost-Laravel-sport-public-admin-posts-2022-11-29-12_00_25](https://user-images.githubusercontent.com/107037107/204499021-892a49c6-9f3c-48d9-a20e-341854f81b50.png)
# Users:
# ![screencapture-localhost-Laravel-sport-public-admin-users-2022-12-19-13_31_42](https://user-images.githubusercontent.com/107037107/208416755-a8d2ca00-bf77-4d0f-a5d4-f10a4b875e27.png)
# Comments:
# ![Screenshot 2022-12-19 133410](https://user-images.githubusercontent.com/107037107/208417183-374fdb32-f248-4ded-965d-5eae9e487e8d.png)
# Post update:
# ![screencapture-localhost-Laravel-sport-public-posts-3-edit-2022-11-17-19_46_32](https://user-images.githubusercontent.com/107037107/202519792-ceaea88c-a13c-43ad-9266-342e7180d529.png)
# New post:
# ![screencapture-localhost-Laravel-sport-public-posts-create-2022-11-17-19_51_19](https://user-images.githubusercontent.com/107037107/202520637-7ad3ba75-0a29-4f39-840b-41e6b4123908.png)
# Product update:
# ![screencapture-localhost-Laravel-sport-public-products-2-edit-2022-12-12-10_44_29](https://user-images.githubusercontent.com/107037107/207000673-efe68c08-46ce-411e-a893-adb2da880d42.png)
# Profile update:
# ![screencapture-localhost-Laravel-sport-public-profilis-1-2022-12-13-10_13_31](https://user-images.githubusercontent.com/107037107/207261919-800d86d9-589e-4c63-986b-5e234b9d9290.png)
# Orders:
# ![screencapture-localhost-Laravel-sport-public-orders-2022-12-23-13_01_47](https://user-images.githubusercontent.com/107037107/209325122-be862feb-42b8-45ab-b02b-fa2a56947c1b.png)
# All posts (logged out) in lithuanian language:
# ![screencapture-localhost-Laravel-sport-public-2022-12-14-10_19_12](https://user-images.githubusercontent.com/107037107/207542889-5d7cc2d1-35e0-495c-aded-7fd3c5c735fe.png)
# One post (logged in):
# ![screencapture-localhost-Laravel-sport-public-posts-8-2022-12-14-10_23_28](https://user-images.githubusercontent.com/107037107/207543690-639f68e9-fc0b-4071-a122-8015491be3e7.png)
# One post (logged out) in lt:
# ![screencapture-localhost-Laravel-sport-public-posts-8-2022-12-14-10_21_05](https://user-images.githubusercontent.com/107037107/207543259-ebff275c-b702-465e-aa1e-2efdd69eba3c.png)
# Email verification:
# ![screencapture-localhost-Laravel-sport-public-email-verify-2022-12-27-11_40_20](https://user-images.githubusercontent.com/107037107/209648241-5f3ce371-a2f4-42ed-9b23-45daa1ebecc3.png)
# E-Shop all products :
# ![Screenshot 2022-12-19 133632](https://user-images.githubusercontent.com/107037107/208417517-2b4db5ce-23b1-4cf9-886f-adf72081129b.png)
# E-Shop One product details :
# ![screencapture-localhost-Laravel-sport-public-products-1-2022-12-09-11_19_46](https://user-images.githubusercontent.com/107037107/206668525-01a83e53-7104-4ed5-b69d-04725b394c73.png)
# E-Shop cart:
# ![screencapture-localhost-Laravel-sport-public-cart-2022-12-19-13_38_27](https://user-images.githubusercontent.com/107037107/208417841-5b2b603c-4b70-42ce-8f5f-40b1dd883c91.png)
# E-Shop payment:
# ![screencapture-localhost-Laravel-sport-public-stripe-276-2022-12-19-13_42_46](https://user-images.githubusercontent.com/107037107/208427510-c391d0a3-a026-4ca3-bd15-ee945c89c91a.png)
# Redirect after payment:
# ![screencapture-localhost-Laravel-sport-public-stripez-36-2022-12-19-16_36_45](https://user-images.githubusercontent.com/107037107/208450444-a808bc76-64b0-4af6-9e8e-60d42b60a53e.png)
# User comments:
# ![screencapture-localhost-Laravel-sport-public-comments-2022-11-17-20_35_40](https://user-images.githubusercontent.com/107037107/202530082-0479ddf2-cffe-491f-bf28-bf5634ecca9c.png)
# Responsive all posts:
# ![screencapture-localhost-Laravel-sport-public-2022-11-17-14_38_16](https://user-images.githubusercontent.com/107037107/202448632-014339c7-48db-4ff9-a51e-86a310529803.png)
# Responsive one post:
# ![screencapture-localhost-Laravel-sport-public-posts-8-2022-12-19-13_40_25](https://user-images.githubusercontent.com/107037107/208418173-9796f21a-ea1e-4d19-a85c-c7254e5612d5.png)
# NBA posts and schedule( from API ):
# ![screencapture-localhost-Laravel-sport-public-nba-2022-12-29-12_38_48](https://user-images.githubusercontent.com/107037107/209939875-fa102c88-9a52-4cb9-a238-3fe8a956d222.png)
