-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2022 at 04:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gurman`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Hladna predjela'),
(2, 'Topla predjela'),
(3, 'Supe i čorbe'),
(4, 'Salate'),
(5, 'Pite i testa'),
(6, 'Glavna jela'),
(7, 'Ribe i morski plodovi'),
(8, 'Sosovi'),
(9, 'Torte'),
(10, 'Kolači'),
(11, 'Zimnica');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `comment_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `username`, `comment_content`) VALUES
(1, 9, 'andrija123', 'super recept'),
(2, 9, 'andrija123', 'super recept');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_user_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_sastojci` text NOT NULL,
  `post_priprema` text NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_user_id`, `post_title`, `post_author`, `post_sastojci`, `post_priprema`, `post_date`, `post_image`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(12, 1, 16, 'Šareni slani rolati', 'Andrija Ficovic', 'ZA KORU POTREBNO JE\r\n6 jaja\r\n6 kasika brasna\r\n3 kasike vode\r\n3 kasike mleka\r\n1 kesica praska za pecivo i jedna kasicica soli\r\nako je crveni dodati 2 pune kasike ajvara\r\nza zeleni 500 g smrznutog spanaca (odlediti :)*\r\ntufnasti dodati 2 pune kasike maka\r\nZA FIL\r\n500 g sira\r\n1 casa pavlake\r\n300 g sunke\r\n300 g seckanih kiselih krastavcica\r\n1 rendano kuvano jaje\r\ni ako ima malo rendanog kackavalja\r\n', 'Napravite biskvit tako što ćete umutiti 6 belanaca sa kašičicom soli u čvrst sneg.\r\n\r\n2.\r\nDodajte žutanjke i izmešajte dobro.\r\n\r\n3.\r\nUspite 3 kašike mleka i 3 kašike vode. Promešajte.\r\n\r\n4.\r\nDodajte 6 kašika brašna i prašak za pecivo.\r\n\r\n\r\n5.\r\nLagano umešajte na najmanjoj brzini.Potom dodati ili spanac il ajvar ili mak .Obložite veliku tepsiju masnim papirom i izručite smesu.\r\n\r\n6.\r\nRavnomerno je razvucite kašikom i kad ste gotovi lupite malo tepsijom o rub radne površine da izađu mehurići vazduha.\r\n\r\n7.\r\nPecite na 180° kao što pečete i klasičan biskvit za kolače.\r\n\r\n8.\r\nVruć rolat umotajte zajedno sa papirom na kojem se pekao i ostavite da se ohladi.\r\n\r\n\r\n9.\r\nU međuvremenu pripremite nadev tj. fil pomesti sir i pavlaku premazati ohladjenu koru i poredjati ostale sastojke..Čvrsto uvijte rolat, umotajte ga u plastičnu foliju, i ostavite preko noć (ili na nekoliko sati) u frižideru.', '2022-01-31', 'images/recepti/12.jpg', 'rolati slano predjela', 0, 'draft'),
(13, 1, 16, 'Ajvar kocke', 'Andrija Ficovic', 'KORA OD SPINATA\r\n4 jaja\r\n4 kasike brasna\r\n300g spinata\r\n1dc pavlake\r\n1 prasak za pecivo\r\nso\r\nFIL\r\n500g kravljeg sira ili zagrebackog\r\n3 kasike ajvara\r\n1/2 kascice bjelog luka\r\nOSTALO\r\n3 Palacinke\r\n150g sunke\r\n150g gaude', 'Zelena kora:Bjelanjke odvojiti od zumanjaka.Bjelanjke izmutiti mikserom u cvrst snijeg.\r\n\r\n2.\r\nSpinat obariti u u vreloj vodi,a zatim ga procjediti i  sitno isjeckati.\r\n\r\n\r\n3.\r\nPosebno umutiti zumanjke,dodati spinat,brasno, pavlaku i pras.za pecivo.Sve fino posoliti.\r\n\r\n4.\r\nSad fino spojitri bjelanjke i ostalu smjesu,rucno.Uzeti pleh,staviti papir za pecenje i nasuti u njega smjesu.Peci na 200C dok ne porumeni.Pleh je manji od rerne.\r\n\r\n5.\r\nFil:Sir kravlji  izmjesati sa ajvarom i bjelim lukom u prahu.Palacinke radite na uobicajen nacin.Poslozite po  palacinkama, 3 sunke(lista) i narendane gaude-to po zelji.Zarolati.\r\n\r\n6.\r\nFinalni postupak:Sa pecene kore skinuti pek papir i koru presjeci na pola.Na pladanj stavite koru.Na koru namazite polovinom fila,poredati tri palacinke jednu do druge sa malo lufta,da bi dosao tu malo fila.Ja pravim vece palacinke,mislim, tava mi je veca ako vam bude falilo samo donastavite palacinke.\r\n\r\n7.\r\nPreko palacinaka nanjeti preostali fil od ajvara i poravnati.Odozgo prekriti drugom polovinom kore.Blago pritisnuti.I u frizider da se stegne.\r\n\r\n8.\r\nUkrasiti mozete sa majonezom i rendanom gaudom ili kao ja, ostavila sam malo fila za gore.\r\n', '2022-01-31', 'images/recepti/13.jpg', 'ajvar predjela', 0, 'draft'),
(14, 2, 19, 'Piroške', 'Marija Markovic', '3 jaja\r\n300 g kravljeg mladog sira\r\n300 g brašna\r\n1 kesica praška za pecivo\r\n1 kašičica soli\r\nulje po potrebi', 'Umutiti jaja, dodati izgniječen sir, so i dodati brašno pomiješano sa pecivom. Unijesiti tijesto, rastanjiti debljine 1 cm zatim sjeći na trake i pržiti na vrelom ulju!', '2022-01-31', 'images/recepti/14.jpg', 'piroške testo', 0, 'draft'),
(15, 3, 19, 'Griz knedle za supu', 'Marija Markovic', '1 Jaje\r\n3 supene kasike psenicnog griz\r\n2-3 kasike ulja ili masti\r\n1 kafena kasika zacina c\r\nna kraju uvek dodati jos dodatne dve kasika griza... Prijatno', 'Jaja umutiti viljuskom i dodati ulje ili mast,pa dodati griz ali ne prepune kasike jer na kraju uvek dodate jos dve,i dodati kafenu kasicicu zacina c\r\n\r\n2.\r\nU supicu koja kljuca polako spustate kasikom knedle kada ih dodate sve ostavite da se krckaju par minuta,posle toga sklonite sa vatre i poklopite da odstoji 10-15 minuta.', '2022-01-31', 'images/recepti/15.jpg', 'knedle supa griz', 0, 'draft'),
(16, 4, 19, 'Salata od piletine i makarona', 'Marija Markovic', '300 g kuhane piletine\r\n150 g mrkve\r\n150 g graška\r\n150 g Kukuruza šećerca Podravka\r\n100 g gorgonzole\r\n150 g makarona\r\n1 žlica Senfa estragon Podravka\r\n400 ml kiselog vrhnja\r\nmalo soli', 'Kuhanu piletinu narežite na kockice.\r\n\r\n2.\r\nMrkvu također narežite na kockice, pa je zajedno s graškom skuhajte u blago posoljenoj vodi.\r\n\r\n\r\n3.\r\nPiletini dodajte ocijeđeno i ohlađeno kuhano povrće, ocijeđeni kukuruz, natrganu gorgonzolu te kuhanu i ohlađenu tjesteninu.\r\n\r\n4.\r\nSenf, vrhnje i malo soli pomiješajte te prelijte preko salate od piletine i makarona.', '2022-01-31', 'images/recepti/16.jpg', 'salata makarone piletina', 0, 'draft'),
(17, 5, 20, 'Gibanica', 'Petar Petrović', '500 gr gotovih kora\r\n500 gr sitnog sira\r\n3-5 jaja\r\n1 solja jogurta\r\n1 solja kisele vode(obicna voda sa dve kasicice pr.za pecivo)\r\n1/2 solja ulja\r\n1 kasicica soli', '\r\n1. Zagrejte rernu na 200 st.C i pripremite pleh sa hartijom za pecenje.\r\n\r\n2.\r\n2. Pripremite preliv:\r\nPromesajte jaja, jourt, vodu ,ulja i so u jednolicnu masu. Prvo malo izmutite jaja, pa onda dodajte ostalo.\r\n\r\n\r\n3.\r\n3. Rasposli se jedna kora na radni sto i poprska se ravnomerno sa malo sitnog sira. Preko ove se stavi druga kora i opet se poprska sa malo sitnog sira, pa treca i sve tako dok se kore i sir ne potrose. Znaci, sve kore jedna preko druge.\r\n\r\n4.\r\n4. Onda se uviju u rolat i podele sa malim zasecima na deset jednakih delova. Ja to radim na dva prsta rastojanje i izagju deset parceta. Onga se ostrim nozem iseku parcici. Kako isecete parce, tako ga stavite u pleh, sa sirom stranom prema dole. Poregjajte sve parcice jedan do drugoga u dva reda, ako je plek dugacak. Ako je okrugli, onda redite naokolo i zavsavate u sredini.\r\n\r\n\r\n5.\r\n5. Pazljivo prelijte rolatice sa prelivom, tako da svaki rolatic dobije istu kolicinu preliva, da bi posle bilo jednako socno.\r\n\r\n6.\r\n6. Pecite oko 40 min. ili dok gibanica dobro ne porumeni.', '2022-01-31', 'images/recepti/17.jpg', 'gibanica pite testa', 0, 'draft'),
(18, 6, 20, 'Ćufte u paradajz sosu', 'Petar Petrović', '400 g junećeg mlevenog mesa\r\n1 mala glavica crnog luka\r\n2 čena belog luka\r\n1 parče starog hleba(samo sredina)\r\n1 kašičica vegete\r\nsoli po ukusu\r\n2 kašičice mljevene paprike\r\n1 jaje\r\nmalo seckanog peršuna, bibera', 'U posudi pomešajte sve sastojke za ćufte. Crni i beli luk iseckajte vrlo sitno, sredinu od hleba natopite sa malo vode pa istiskajte medju dlanovima i razmrvite prstima, jaje lagano umutite viljuškom i sve zajedno sjedinite u homogenu masu. Pokrite prianjajućom folijom i ostavite u frižideru da odstoji neko vreme, najmanje pola sata. Nakon tog vremena, izvadite posudu iz frižidera i pobrašnjenim rukama pravite male ćufte, mada možete i malo veće, kako volite. Meni je od ove količine izašlo 17 komada\r\n\r\n\r\n2.\r\nĆufte možete pržiti u tiganju, pa ih izvaditi na tanjir i onda kasnije spuštati u sos koji ste napravili u drugoj, dubljoj šerpi. Ja sam to malo pojednostavila pa ako vam se svidja ovaj način vi uradite kao ja, ovako: odmah uzmite dublju šerpu u kojoj ćete krčkati ćufte u sosu i sipajte ulje za prženje, da oblije dno pa još malo. Ćufte pržite u zagrejanom ulju, okrenite i ispržite sa obe strane. Da ne biste vadili ćufte iz šerpe, samo ih gurnite uz kraj, jednu preko druge, oslobodite otprilike polovinu dna šerpe gde ćete napraviti zapršku. Stavite brašno i kratkim potezima mešajte, propržite ga malo pa dodajte alevu papriku, promešajte zajedno i nalite paradajz iz flaše. Ja koristim domaći paradajz, mleven svež i ostavljen za zimu u flašama, ali svakako može da posluži i kupljen.\r\n\r\n\r\n3.\r\nSad je trenutak da počnete lagano da povlačite ćuftice u zapršku i da sve zajedno promešate uz dolivanje vode malo po malo. Posolite sos po ukusu, poklopite i ostavite na tihoj vatri da se krčka. Po potrebi dolijte još malo vode, u zavisnosti od toga hoćete li redji ili gusti sos. Na kraju dodajte seckan peršun\r\n\r\n', '2022-01-31', 'images/recepti/18.jpg', 'cufte ćufte meso ', 0, 'draft'),
(19, 7, 20, 'Šaran za gurmane', 'Petar Petrović', '1 veći šaran\r\n100 g mesnate slanine\r\n100 g gaude\r\n5-6 čenova belog luka\r\n50 ml maslinovog ulja\r\n1 dl belog vina\r\npo ukusu so\r\npo ukusu suvi biljni začin\r\nmalo majorana\r\n1 limun', 'Očišćenog šarana dobro oprati i ubrusom obrisati kako bi se uklonio višak tečnosti. Po površini napraviti proreze (na svakih 2 cm otprilike). Limun iseći na tanke kriške. U svaki zasečeni prorez staviti po parče mesnate slanine, gaude, limuna i čen belog luka.Šaran za gurmane\r\nRibu posoliti i začiniti sa svih strana suvim biljnim začinom. Preliti je sa malo maslinovog ulja. Oko šarana usuti 1 dl belog vina. Po želji, oko ribe rasporediti krompiriće. Peći u rerni prethodno zagrejanoj na 200 stepeni oko 50 minuta. Pred kraj pečenja posuti sa malo majorana i vratiti u rernu na još par minuta.', '2022-01-31', 'images/recepti/19.jpg', 'saran šaran ribe riba', 0, 'draft'),
(20, 8, 21, 'Domaći majonez', 'Nina  Jovanović', '1 jaje\r\n1 kasicica senfa\r\n1 kasicica jabukovog sirceta\r\nbiber\r\nso\r\n1/4 l ulja ili vise ako treba', 'U posudu u kojoj ce se mutiti majonez(pozeljno je da bude uza i visocija)sipati zumance, senf, sirce i biber pa malo promutiti mikserom i onada u tankom mlazu dolivati ulje. Mutiti dok se ne pocne zgusnjavati i po potrebi dodati i vise od 1/4l ulja jer treba da bude bas cvrst.\r\n\r\n2.\r\nBjelance posebno umutiti sa malo soli pa dodati pripremljenom majonezu pomijesati prvo kasikom pa mikserom.', '2022-01-31', 'images/recepti/20.jpg', 'majonez jaja', 0, 'draft'),
(21, 9, 21, 'Torta Mileram', 'Nina  Jovanović', 'TIJESTO\r\n25 dag glatkog brašna\r\n10 dag šećera\r\n1 paketić praška za pecivo\r\n1 paketić vanilin šećera\r\n8 dag maslaca\r\n1 jaje\r\nFIL\r\n1/2 l mlijeka\r\n2 vrećice pudinga od vanilije\r\n20 dag šećera\r\n80 dag milerama (ili masnog kiselog vrhnja)\r\nvoće\r\npreljev za tortu', '\r\nOd navedenih sastojaka zamijesiti prhko tijesto i ostaviti u hladnjaku oko 45 minuta. Tada ga razvaljati i staviti na dno i stijenke okruglog kalupa, prethodno namazanog margarinom i posutog brašnom.\r\n\r\nNAPOMENA: Ako vam je tijesto previše suho, mrvi se, dodajte žlicu kiselog vrhnja, malo maslaca, što god...  nećete pogriješiti...\r\n\r\n2.\r\nU mlijeku skuhati puding i šećer, skinuti s vatre i u vrelo istresti mileram. Odmah sipati u kalup, preko fila staviti voće po želji, može biti doista svako voće i kombinacija svih vrsta voća.\r\n\r\n\r\n3.\r\nPeći 70 minuta u pećnici zagrijanoj na 170 stupnjeva. Dobro ohladiti, najbolje preko noći i tada preliti preljevom za torte.\r\n\r\nUvijek je pečem u kalupu promjera 26 cm.\r\n\r\n4.\r\nKada tortu izvadite iz pećnice fil će se “tresti” i “mrdati”. Neka vas to ne brine, stegnut će se hladeći.', '2022-01-31', 'images/recepti/21.jpg', 'torte cokolada torta', 0, 'draft'),
(22, 10, 21, 'Žuti kolač s višnjama', 'Nina  Jovanović', '5 jaja\r\n1,5 čaša šećera (300 gr)\r\n1 čaša jogurta (od 2 dl, ili 200 gr jogurta)\r\n1 čaša ulja (170 gr)\r\n2 čaše brašna ( ukupno 270 gr)\r\n1/2 kesice praška za pecivo\r\n400 - 500 gr višanja\r\nmalo prah šećera za posipanje kolača\r\nvanil šećer\r\nčaša = 2 dl', 'Razbiti jaja i odvojiti belanca od žumanaca.\r\n\r\nBelanca mikserom umutiti u čvrst sneg, pa im postepeno dodavati šećer.\r\n\r\nMutiti još malo, pa odložiti mikser.\r\n\r\nDodati žumanca, pa ih umešati polako, špatulom.\r\n\r\nPostepeno dodati i ostale sastojke (jogurt, ulje, brašno i prašak za pecivo)  i polako ih sjedinjavati sa belancima.\r\n\r\n2.\r\nKad testo bude homogeno, izliti ga u podmazan i brašnom posut pleh (moj pleh je dimenzija 35 x 20 cm). Na testo staviti višnje (sveže, iz zamrzivača ili iz kompota) koje su malo oceđene od viška soka.', '2022-01-31', 'images/recepti/22.jpg', 'kolači višnje kolaci visnje kolac', 0, 'draft'),
(23, 11, 21, 'Džem i pekmez od šljiva iz pećnice', 'Nina  Jovanović', '2 kg šljiva\r\n1 kg šećera (možete smanjiti šečer ako su šljive slatke)\r\n2 dcl vinskog octa (može i malo crnog vina (1 dcl octa 1 dcl vina)\r\n1/2 dcl ruma\r\n1-2 limuna prerezan na pola (na 10 kg) ili 2 na 20 kg\r\n1 1 žličica cimeta u prahu, klinčiča mljevenih ili cijelih, malo kardamoma ali to po želji\r\nvanilin šečer ili štapić od vanilije istrgati srž\r\n*čokolade* ako volite na 5 kg 15-20 dag tamne', '\r\nOvo je po bakinom receptu za pekmez  samo sam si prilagodila i olakšala da ne stojim non stop uz peć i mješam, sve je isto samo ga umjesto kuhanja na peći pećem u pećnici i malo duže nego prema receptu iz bakine bilježnice..\r\n\r\nJoš ako imate ličke šljive, pa ga pečete tj. kuhate u kotlu velikom  na otvorenom.. E tako se nekad  radio pekmez i džem u Lici..u mojoj dragoj Gackoj dolini\r\n\r\nImage\r\n2.\r\nOperite i očistite šljive od koštica, raspolovite ih pa usitnite na polovice i četvrtine jedan manji dio na manje kockice. Pospite šećerom i ostavite ih u posudi preko noći. Malo ostavite šećera za rastopit s vinskim octom.  Netko dodaje šečer pri kraju.. probala sam  nište ne mijenja na stvari..Moja baka  stavljala je odmah šečer a šogorica  stavlja  pred kraj kuhanja a radi ga u kotlu na otvorenom.  \r\n\r\nŠEČER možete smanjiti  po ukusu i  na 5kg  sam stavila 1kg  ili na 1/2kg  ili po 1 kg 20 dag  no ovisi koliko su šljive slatke a i koja vrsta.\r\n\r\nMožete dodati čokolade ..nekad odvojim jedan dio kad radim od 10 -15 kg i  npr. na 5 kg pa ubacim \r\n\r\nImage\r\n\r\n3.\r\nSutradan vinski ocat zakuhati u širokoj posudi… dodati mu ostatak šećera. Kad nastane gusti sirup od šećera i octa, dodajte šljive, zatim staviti u široku padelu pokriti folijom kikiriki posudu ili tzv. peku, ili na lim za pećenje kolača (pokriti folijom ili zaštiti stjenke pećnice folijom), dodati šećer, limun na pola  nešpricani ako je moguće vaniliju, cimet, kardamom , klinčiće vinski ocat i crno vino ako želite.. Staviti u pečnicu zagrijanu na 200°C a poslje smanji na 160°C. Džem se peče u pećnici oko dva do dva i pol sata i do 3h (uvijek duže kuham ili pećem nego po receptu i nikad mi se nije pokvarilo) uz povremeno miješanje. Pogledam češće tj savakih 20-30 min.Stjenke pećnice zaštitim alufolijom pa imate manje za čistititi. Šljive će mijenjati boju od rozkaste te, do crvenkaste i na kraju ljubičaste, zbog vinskog octa  i vina ima jako ljepu boju.\r\n\r\nImage\r\n4.\r\nKada džem ili pekmez bude lagano gust i taman, oko pola sata prije kraja  dodajte mu rum i začine, cimeta i klinčića volim stavit više, ali to je stvar ukusa. Kod mene u Gackoj dolini se stavljao samo šljive i šečer i malo vinskog octa zbog boje. Dobro promiješati da se svi sastojci prožmu ili kako se to kaže sljube.  Pekmez  duže se peće  npr. po 1 kg  do 1,5h   ili u  kikiriki posudi  stavim 3kg  šljiva i pekmez   do 3h --par puta promiješati dok ne dobije čvrstinu a džem  malo kraće prepolovljene šljive cca 1kg 1h  a ovisi i o šljivama. Kikiriki posuda ima poklopac  i pekmez ili džem ne šprica  a možete staviti i široku veću posudu koja stane u pećnicu i pokrijte alu folijom a vrata zaštite folijom(to uvijek radim i kad  pećem meso i druge stvari  i pećnica mi je kao nova)\r\n\r\nImage\r\n\r\n5.\r\nUlijte u staklenke predhodno zagrijane u pećnici na 120°C oko 20 minuta. Zamotati u deku  položenu na pod  element  i omotajte staklenke ako ih je puno..da se hladi jednu noć i drugi cjeli dan ( ja ostavim dva dana..cca 48h). Ostavite džem nekoliko dana na suhom i tamnom mjestu jer bolji što duže stoji, nakon mjesec dana će biti idealan Volim ga jer se osjete komadići šljiva. ovo gore na slici je star 10 mj od prošle godine. Savjet:Tegle ugrijati u pećnici, čepove (iskljucivo metalne) isto tako,.... vrući džem sipati u vruće tegle..omotati dekom i ostaviti 48 sati dase skroz ohladi. Ako je manje teglica  možete ih ostaviti u zatvorenoj toploj pećnici  isključiti je  i neka se ohladi tako skroz preko noći... Ima i ovaj jednostavan način  da teglice  preokrenete tople   naopako kao što to radi anka56  i  preokrenite tegle naopačke na poklopac na par minuta  i vratite u prvobitan položaj ( tako se vakumira i ne trba umatati u deke  ali tako radim godinama pa je to već navika i povjrenje da mi se pekmez ili džem ne pokvari godinama). Ostavite da se ohladi...\r\n\r\nImage\r\n6.\r\nU ovaj recept nije potrebno dodavati konzervans, jer će se ovako pripremljeni džem, u ostavi na hladnom i tamnom potrajati preko zime. Ovakav starinski način pripreme je praktičan, jer se ne mora stajati uz džem cijelo vrijeme i miješati tokom kuhanja, već je dovoljno nekoliko puta promješati za vrijeme pečenja u pečnici. Nedavno još nije bilo šljiva imala sam smrznute šljive za knedle i ovaj džem i napravila sam odličnu pitu ili tzv tart od šljiva i još slika pite prije pećenja i jedan komadić pite izbliza\r\n\r\nImage\r\n7.\r\nPEKMEZ OD ŠLJIVA BEZ ŠEČERA\r\n\r\n Potrebno je izdvojiti dio šljiva ili količinu na 5kg . Posve zrele šljive oprati napraviti u pripremi kao za džem i kad su odstajale preko noći ujutro ih propasiram tj sameljem u multipraktuku(blender)malo ih kuhati 20 minut i premjestim u pecnicu. Svakih 20-tak minuta pogledam (pokrijem folijom to mi je najednostvnije) i promješam . Kad se smanji skoro na pola a miješajući vidite dno pekmez je gotov. Kuhanje se skrati a pekmez duže traje što je gušći Bez šečera i ičega može i do dvije godine trajati.\r\nZa pekmez sa šečerom sve isto samo dodam šečera i malo vinskog octa i ništa više jer volimo okus šljiva čisti ali se može dodati limunova korica  i limunov sok, vanilin šečer, likera  mrvu..đumbir, klinčići, cimet ono što volite pa i čokoladu za kuhanje uz vinski ocat volim dodati. Moja baka je dodavala 1 štamplek rakije i octa te šečer i šljive.Spremiti isto u staklenke kao i džem gore je opisano. *Ako želite da se kožica osjeti onda NE mljeti u blenderu nego ih na pola i četvrtine i pečeje malo skratiti tj pratiti da se kožica osjeti.\r\n\r\nImage\r\n8.\r\nMože se dobiti i pekmez sa kožicama onda ih prepolovite i kuhajte  tj pecite...i provjerite  kad se dosta zgusne  vidjet ćete i sami osjetiti nakon 1,5-2h kako se kožica sfrče... i sve ostalo napravite kao  u navedenom..pod br.7\r\n\r\nPEKMEZ SA ČOKOLADOM  ..očistiti šljive  i oprati prepoloviti   stavi u posudu sa šećerom i u pećnicu...možete usitniniti štapnim mikserom ili u blenderu...Dodati pri kraju  malo ruma štamplek  do dva ruma..(cimeta po želji) i čokoladu na kockice...te vanilija štapić raspoloviti i istisnuti srž.. ili samo šljive i čokoladu.... Kad se zgusnbe...cca 1,5-2 h se peće  stavitzi u ugrujane staklenke zatvoriti i  okrenuti naopačke  na par minuta  tako se odlično vakumira  i garant se ne kvari.\r\n\r\nImage\r\n\r\n9.\r\nDžem sa dva sastojka  šljive i vinski ocat a bez šečera...Kad su šljive same po sebi slatke...\r\n\r\n10 kg kupljenih a  bile su slatke samo tako i napravila jer mi ne stane u ovu kikiriki posudu, pa sam stavila u ovu vekliku koja stane u pećnicu... Iključila na 200°C  i kad je zavrilo smanjila na 160°C i pekla ga 3h  i par puta promješala..jedino sam dodala 2 dcl vinskog octa bez boje... Pekmez je  ispao savšen zj džem jer moji vole da se osjete komadići šljiva ...i šećer mu ne dostaje..inaće dodam čokolade i vanilija burbon...i ruma cimeta klinčića.. Ovaj put mi je okus pravi onaj bakin..šljiva dođe do punog izražaja... Ovo je druga tura   džema jer gamoji vole u palačinkama, pekmezovnici na kruh za doručak  itd..', '2022-01-31', 'images/recepti/23.jpg', 'džem dzem pekmez šljive sljive sljiva', 0, 'draft');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `surname`, `username`, `email`, `password`) VALUES
(16, 'Andrija', 'Ficovic', 'andrija123', 'andrijaficovic45@gmail.com', '$2y$10$KdJ7NiSqDebX3F4OsKdg8OXkBh2X34CLBHxeTm7pM37tdVMzg4v8i'),
(17, 'Milan', 'Markovic', 'milan123', 'marijamilicevic1989@gmail.com', '$2y$10$.hurpEs2Dt5pXxKsys9QxehNxQdaWOt/Jlt7g4yrAjkfitoNMn6Ii'),
(18, 'Milic', 'Jovanovic', 'mica123', 'milica@gmail.com', '$2y$10$QK0bjCUVtH0hOtjdcOS3BOzXos5kXNo94X3Iq3IhXhwkxG57it.YW'),
(19, 'Marija', 'Markovic', 'marija123', 'marija@gmail.com', '$2y$10$zDOWWs3Oc6sr9ePYIzNoYO8aTVtXoYMy/rb4MmcElhvoVbMt4SV2W'),
(20, 'Petar', 'Petrović', 'petar123', 'pera@gmail.com', '$2y$10$k2RHRuruOQCiFbYtFrMYrO8.ASK1x9fH6arLPROIEM4U76fnWXF1O'),
(21, 'Nina ', 'Jovanović', 'nina123', 'nina@gmail.com', '$2y$10$ZEUScVI8P8WU2lqmrT7jF.eHBZgSj3vPzCmxWHbvd5ecB0fROKFhG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
