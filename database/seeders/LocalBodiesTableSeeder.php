<?php

namespace Database\Seeders;

use App\Models\LocalBody;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocalBodiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $localBodies = [
            //Province 1
            // Bhojpur District (ID: 1)
            ['name' => 'Bhojpur Municipality', 'district_id' => 1,],
            ['name' => 'Shadananda Municipality', 'district_id' => 1,],
            ['name' => 'Aamchowk Rural Municipality', 'district_id' => 1],
            ['name' => 'Arun Rural Municipality', 'district_id' => 1],
            ['name' => 'Hatuwagadhi Rural Municipality', 'district_id' => 1],
            ['name' => 'Pauwadungma Rural Municipality', 'district_id' => 1],
            ['name' => 'Ramprasad Rai Rural Municipality', 'district_id' => 1],
            ['name' => 'Salpasilichho Rural Municipality', 'district_id' => 1],

            // Dhankuta District (ID: 2)
            ['name' => 'Dhankuta Municipality', 'district_id' => 2,],
            ['name' => 'Pakhribas Municipality', 'district_id' => 2,],
            ['name' => 'Chhathar Jorpati Rural Municipality', 'district_id' => 2],
            ['name' => 'Mahalaxmi Rural Municipality', 'district_id' => 2],
            ['name' => 'Sangurigadhi Rural Municipality', 'district_id' => 2],
            ['name' => 'Shahidbhumi Rural Municipality', 'district_id' => 2],

            // Ilam District (ID: 3)
            ['name' => 'Ilam Municipality', 'district_id' => 3,],
            ['name' => 'Deumai Municipality', 'district_id' => 3,],
            ['name' => 'Mai Municipality', 'district_id' => 3,],
            ['name' => 'Suryodaya Municipality', 'district_id' => 3,],
            ['name' => 'Chulachuli Rural Municipality', 'district_id' => 3],
            ['name' => 'Fakphokthum Rural Municipality', 'district_id' => 3],
            ['name' => 'Maijogmai Rural Municipality', 'district_id' => 3],
            ['name' => 'Mangsebung Rural Municipality', 'district_id' => 3],
            ['name' => 'Rong Rural Municipality', 'district_id' => 3],

            // Jhapa District (ID: 4)
            ['name' => 'Bhadrapur Municipality', 'district_id' => 4,],
            ['name' => 'Birtamod Municipality', 'district_id' => 4,],
            ['name' => 'Damak Municipality', 'district_id' => 4,],
            ['name' => 'Kankai Municipality', 'district_id' => 4,],
            ['name' => 'Mechinagar Municipality', 'district_id' => 4,],
            ['name' => 'Arjundhara Municipality', 'district_id' => 4,],
            ['name' => 'Shivasatakshi Municipality', 'district_id' => 4,],
            ['name' => 'Gauradaha Municipality', 'district_id' => 4,],
            ['name' => 'Gauriganj Rural Municipality', 'district_id' => 4],
            ['name' => 'Barhadashi Rural Municipality', 'district_id' => 4],
            ['name' => 'Buddhashanti Rural Municipality', 'district_id' => 4],
            ['name' => 'Haldibari Rural Municipality', 'district_id' => 4],
            ['name' => 'Jhapa Rural Municipality', 'district_id' => 4],
            ['name' => 'Kamal Rural Municipality', 'district_id' => 4],

            // Khotang District (ID: 5)
            ['name' => 'Halesi Tuwachung Municipality', 'district_id' => 5,],
            ['name' => 'Diktel Rupakot Majhuwagadhi Municipality', 'district_id' => 5,],
            ['name' => 'Aiselukharka Rural Municipality', 'district_id' => 5],
            ['name' => 'Barahapokhari Rural Municipality', 'district_id' => 5],
            ['name' => 'Diprung Chuichumma Rural Municipality', 'district_id' => 5],
            ['name' => 'Jantedhunga Rural Municipality', 'district_id' => 5],
            ['name' => 'Kepilasgadhi Rural Municipality', 'district_id' => 5],
            ['name' => 'Khotehang Rural Municipality', 'district_id' => 5],
            ['name' => 'Lamidanda Rural Municipality', 'district_id' => 5],
            ['name' => 'Rawabesi Rural Municipality', 'district_id' => 5],

            // Morang District (ID: 6)
            ['name' => 'Biratnagar Metropolitan City', 'district_id' => 6],
            ['name' => 'Belbari Municipality', 'district_id' => 6,],
            ['name' => 'Rangeli Municipality', 'district_id' => 6,],
            ['name' => 'Sundarharaicha Municipality', 'district_id' => 6,],
            ['name' => 'Letang Municipality', 'district_id' => 6,],
            ['name' => 'Pathari Shanishchare Municipality', 'district_id' => 6,],
            ['name' => 'Ratuwamai Municipality', 'district_id' => 6,],
            ['name' => 'Sunawarshi Municipality', 'district_id' => 6,],
            ['name' => 'Kanepokhari Rural Municipality', 'district_id' => 6],
            ['name' => 'Kerabari Rural Municipality', 'district_id' => 6],
            ['name' => 'Gramthan Rural Municipality', 'district_id' => 6],
            ['name' => 'Miklajung Rural Municipality', 'district_id' => 6],

            // Okhaldhunga District (ID: 7)
            ['name' => 'Siddhicharan Municipality', 'district_id' => 7,],
            ['name' => 'Champadevi Rural Municipality', 'district_id' => 7],
            ['name' => 'Chisankhugadhi Rural Municipality', 'district_id' => 7],
            ['name' => 'Likhu Rural Municipality', 'district_id' => 7],
            ['name' => 'Manebhanjyang Rural Municipality', 'district_id' => 7],
            ['name' => 'Molung Rural Municipality', 'district_id' => 7],
            ['name' => 'Sunkoshi Rural Municipality', 'district_id' => 7],

            // Panchthar District (ID: 8)
            ['name' => 'Phidim Municipality', 'district_id' => 8,],
            ['name' => 'Falelung Rural Municipality', 'district_id' => 8],
            ['name' => 'Falgunanda Rural Municipality', 'district_id' => 8],
            ['name' => 'Hilihang Rural Municipality', 'district_id' => 8],
            ['name' => 'Kummayak Rural Municipality', 'district_id' => 8],
            ['name' => 'Miklajung Rural Municipality', 'district_id' => 8],
            ['name' => 'Tumbewa Rural Municipality', 'district_id' => 8],

            // Taplejung District (ID: 9)
            ['name' => 'Phungling Municipality', 'district_id' => 9,],
            ['name' => 'Aathrai Tribeni Rural Municipality', 'district_id' => 9],
            ['name' => 'Meringden Rural Municipality', 'district_id' => 9],
            ['name' => 'Mikwakhola Rural Municipality', 'district_id' => 9],
            ['name' => 'Pathibhara Yangwarak Rural Municipality', 'district_id' => 9],
            ['name' => 'Phaktanglung Rural Municipality', 'district_id' => 9],
            ['name' => 'Sidingwa Rural Municipality', 'district_id' => 9],

            // Terhathum District (ID: 10)
            ['name' => 'Myanglung Municipality', 'district_id' => 10,],
            ['name' => 'Aathrai Rural Municipality', 'district_id' => 10],
            ['name' => 'Chhathar Rural Municipality', 'district_id' => 10],
            ['name' => 'Menchhayayem Rural Municipality', 'district_id' => 10],
            ['name' => 'Phedap Rural Municipality', 'district_id' => 10],

            // Udayapur District (ID: 11)
            ['name' => 'Triyuga Municipality', 'district_id' => 11,],
            ['name' => 'Katari Municipality', 'district_id' => 11,],
            ['name' => 'Beltar Basaha Municipality', 'district_id' => 11,],
            ['name' => 'Chaudandigadhi Municipality', 'district_id' => 11],
            ['name' => 'Rautamai Rural Municipality', 'district_id' => 11],
            ['name' => 'Udayapurgadhi Rural Municipality', 'district_id' => 11],

            //Province 2
            // Bara District (ID: 1)
            ['name' => 'Birgunj Metropolitan City', 'district_id' => 1],
            ['name' => 'Patan Municipality', 'district_id' => 1],
            ['name' => 'Kalaiya Municipality', 'district_id' => 1],
            ['name' => 'Kalyanpur Municipality', 'district_id' => 1],
            ['name' => 'Simara Municipality', 'district_id' => 1],
            ['name' => 'Bishrampur Rural Municipality', 'district_id' => 1],
            ['name' => 'Fattepur Rural Municipality', 'district_id' => 1],
            ['name' => 'Nijgadh Rural Municipality', 'district_id' => 1],
            ['name' => 'Pachhwai Rural Municipality', 'district_id' => 1],
            ['name' => 'Rupaidiha Rural Municipality', 'district_id' => 1],

            // Dhanusha District (ID: 2)
            ['name' => 'Janakpur Sub-Metropolitan City', 'district_id' => 2],
            ['name' => 'Dhanushadham Municipality', 'district_id' => 2],
            ['name' => 'Mithila Municipality', 'district_id' => 2],
            ['name' => 'Sabaila Municipality', 'district_id' => 2],
            ['name' => 'Aurahi Municipality', 'district_id' => 2],
            ['name' => 'Balwa Rural Municipality', 'district_id' => 2],
            ['name' => 'Bhagwanpur Rural Municipality', 'district_id' => 2],
            ['name' => 'Dhankuta Rural Municipality', 'district_id' => 2],
            ['name' => 'Haami Rural Municipality', 'district_id' => 2],
            ['name' => 'Shree Krishna Rural Municipality', 'district_id' => 2],

            // Mahottari District (ID: 3)
            ['name' => 'Jaleshwar Municipality', 'district_id' => 3],
            ['name' => 'Mahottari Municipality', 'district_id' => 3],
            ['name' => 'Sarlahi Municipality', 'district_id' => 3],
            ['name' => 'Bairgachhi Municipality', 'district_id' => 3],
            ['name' => 'Ishworpur Municipality', 'district_id' => 3],
            ['name' => 'Aurahi Rural Municipality', 'district_id' => 3],
            ['name' => 'Balawa Rural Municipality', 'district_id' => 3],
            ['name' => 'Bhagawanpur Rural Municipality', 'district_id' => 3],
            ['name' => 'Durgapuri Rural Municipality', 'district_id' => 3],
            ['name' => 'Pipra Rural Municipality', 'district_id' => 3],

            // Sarlahi District (ID: 4)
            ['name' => 'Malangwa Municipality', 'district_id' => 4],
            ['name' => 'Lahan Municipality', 'district_id' => 4],
            ['name' => 'Bagmati Municipality', 'district_id' => 4],
            ['name' => 'Sarlahi Rural Municipality', 'district_id' => 4],
            ['name' => 'Ishworpur Municipality', 'district_id' => 4],
            ['name' => 'Barhathwa Rural Municipality', 'district_id' => 4],
            ['name' => 'Hariharpur Rural Municipality', 'district_id' => 4],
            ['name' => 'Jagdamba Rural Municipality', 'district_id' => 4],
            ['name' => 'Kalaiya Rural Municipality', 'district_id' => 4],
            ['name' => 'Madhav Narayan Rural Municipality', 'district_id' => 4],

            // Siraha District (ID: 5)
            ['name' => 'Lahan Municipality', 'district_id' => 5],
            ['name' => 'Siraha Municipality', 'district_id' => 5],
            ['name' => 'Dhangadhimai Municipality', 'district_id' => 5],
            ['name' => 'Golbazar Municipality', 'district_id' => 5],
            ['name' => 'Mirchaiya Municipality', 'district_id' => 5],
            ['name' => 'Sundarpur Rural Municipality', 'district_id' => 5],
            ['name' => 'Kattar Rural Municipality', 'district_id' => 5],
            ['name' => 'Ramgarh Rural Municipality', 'district_id' => 5],
            ['name' => 'Bharatpur Rural Municipality', 'district_id' => 5],
            ['name' => 'Malangawa Rural Municipality', 'district_id' => 5],

            // Rautahat District (ID: 6)
            ['name' => 'Gaur Municipality', 'district_id' => 6],
            ['name' => 'Rajbiraj Municipality', 'district_id' => 6],
            ['name' => 'Saptakoshi Municipality', 'district_id' => 6],
            ['name' => 'Chhata Municipality', 'district_id' => 6],
            ['name' => 'Dhangadhimai Municipality', 'district_id' => 6],
            ['name' => 'Garuda Rural Municipality', 'district_id' => 6],
            ['name' => 'Ishworpur Rural Municipality', 'district_id' => 6],
            ['name' => 'Madhavpur Rural Municipality', 'district_id' => 6],
            ['name' => 'Rautahat Rural Municipality', 'district_id' => 6],
            ['name' => 'Saptari Rural Municipality', 'district_id' => 6],

            // Mahasangh District (ID: 7)
            ['name' => 'Sangrampur Municipality', 'district_id' => 7],
            ['name' => 'Malangawa Municipality', 'district_id' => 7],
            ['name' => 'Barhathwa Municipality', 'district_id' => 7],
            ['name' => 'Lahan Municipality', 'district_id' => 7],
            ['name' => 'Madhav Narayan Municipality', 'district_id' => 7],
            ['name' => 'Hariharpur Rural Municipality', 'district_id' => 7],
            ['name' => 'Jagdamba Rural Municipality', 'district_id' => 7],
            ['name' => 'Ramgram Rural Municipality', 'district_id' => 7],
            ['name' => 'Barhat Rural Municipality', 'district_id' => 7],
            ['name' => 'Shivganj Rural Municipality', 'district_id' => 7],

            // Dhanusha District (ID: 8)
            ['name' => 'Janakpur Sub-Metropolitan City', 'district_id' => 8],
            ['name' => 'Mithila Municipality', 'district_id' => 8],
            ['name' => 'Dhanushadham Municipality', 'district_id' => 8],
            ['name' => 'Sabaila Municipality', 'district_id' => 8],
            ['name' => 'Aurahi Municipality', 'district_id' => 8],
            ['name' => 'Balawa Rural Municipality', 'district_id' => 8],
            ['name' => 'Bhagwanpur Rural Municipality', 'district_id' => 8],
            ['name' => 'Dhankuta Rural Municipality', 'district_id' => 8],
            ['name' => 'Haami Rural Municipality', 'district_id' => 8],
            ['name' => 'Shree Krishna Rural Municipality', 'district_id' => 8],

            // Bara District (ID: 9)
            ['name' => 'Birgunj Metropolitan City', 'district_id' => 9],
            ['name' => 'Kalaiya Municipality', 'district_id' => 9],
            ['name' => 'Simara Municipality', 'district_id' => 9],
            ['name' => 'Kalyanpur Municipality', 'district_id' => 9],
            ['name' => 'Patan Municipality', 'district_id' => 9],
            ['name' => 'Bishrampur Rural Municipality', 'district_id' => 9],
            ['name' => 'Fattepur Rural Municipality', 'district_id' => 9],
            ['name' => 'Nijgadh Rural Municipality', 'district_id' => 9],
            ['name' => 'Pachhwai Rural Municipality', 'district_id' => 9],
            ['name' => 'Rupaidiha Rural Municipality', 'district_id' => 9],

            // Saptari District (ID: 10)
            ['name' => 'Rajbiraj Municipality', 'district_id' => 10],
            ['name' => 'Saptakoshi Municipality', 'district_id' => 10],
            ['name' => 'Chhathar Municipality', 'district_id' => 10],
            ['name' => 'Lahan Municipality', 'district_id' => 10],
            ['name' => 'Mirchaiya Municipality', 'district_id' => 10],
            ['name' => 'Bharatpur Rural Municipality', 'district_id' => 10],
            ['name' => 'Malangawa Rural Municipality', 'district_id' => 10],
            ['name' => 'Sundarpur Rural Municipality', 'district_id' => 10],
            ['name' => 'Kattar Rural Municipality', 'district_id' => 10],
            ['name' => 'Ramgarh Rural Municipality', 'district_id' => 10],

            // Siraha District (ID: 11)
            ['name' => 'Siraha Municipality', 'district_id' => 11],
            ['name' => 'Golbazar Municipality', 'district_id' => 11],
            ['name' => 'Mirchaiya Municipality', 'district_id' => 11],
            ['name' => 'Dhangadhimai Municipality', 'district_id' => 11],
            ['name' => 'Lahan Municipality', 'district_id' => 11],
            ['name' => 'Bharatpur Rural Municipality', 'district_id' => 11],
            ['name' => 'Sundarpur Rural Municipality', 'district_id' => 11],
            ['name' => 'Kattar Rural Municipality', 'district_id' => 11],
            ['name' => 'Ramgarh Rural Municipality', 'district_id' => 11],
            ['name' => 'Malangawa Rural Municipality', 'district_id' => 11],

            //Province 3
            // Kathmandu District (ID: 1)
            ['name' => 'Kathmandu Metropolitan City', 'district_id' => 1],
            ['name' => 'Lalitpur Metropolitan City', 'district_id' => 1],
            ['name' => 'Bhaktapur Metropolitan City', 'district_id' => 1],
            ['name' => 'Kritipur Municipality', 'district_id' => 1],
            ['name' => 'Thimi Municipality', 'district_id' => 1],
            ['name' => 'Madhyapur Thimi Municipality', 'district_id' => 1],
            ['name' => 'Sundarijal Municipality', 'district_id' => 1],
            ['name' => 'Gokarneshwar Municipality', 'district_id' => 1],
            ['name' => 'Budhanilkantha Municipality', 'district_id' => 1],
            ['name' => 'Shankharapur Municipality', 'district_id' => 1],
            ['name' => 'Jwalamukhi Municipality', 'district_id' => 1],
            ['name' => 'Kageshwori-Manohara Municipality', 'district_id' => 1],
            ['name' => 'Tokha Municipality', 'district_id' => 1],
            ['name' => 'Balkot Municipality', 'district_id' => 1],
            ['name' => 'Patan Municipality', 'district_id' => 1],
            ['name' => 'Bhairab Municipality', 'district_id' => 1],
            ['name' => 'Sankhu Municipality', 'district_id' => 1],
            ['name' => 'Patan Municipality', 'district_id' => 1],
            ['name' => 'Patan Municipality', 'district_id' => 1],
            ['name' => 'Gokarneshwar Rural Municipality', 'district_id' => 1],

            // Bhaktapur District (ID: 2)
            ['name' => 'Bhaktapur Metropolitan City', 'district_id' => 2],
            ['name' => 'Changunarayan Municipality', 'district_id' => 2],
            ['name' => 'Suryabinayak Municipality', 'district_id' => 2],
            ['name' => 'Madhyapur Thimi Municipality', 'district_id' => 2],
            ['name' => 'Jitpurphedi Municipality', 'district_id' => 2],
            ['name' => 'Bhaktapur Rural Municipality', 'district_id' => 2],
            ['name' => 'Madhyapur Rural Municipality', 'district_id' => 2],
            ['name' => 'Patan Rural Municipality', 'district_id' => 2],
            ['name' => 'Nayapati Rural Municipality', 'district_id' => 2],
            ['name' => 'Nagarkot Rural Municipality', 'district_id' => 2],

            // Lalitpur District (ID: 3)
            ['name' => 'Lalitpur Metropolitan City', 'district_id' => 3],
            ['name' => 'Patan Municipality', 'district_id' => 3],
            ['name' => 'Sundarijal Municipality', 'district_id' => 3],
            ['name' => 'Gokarneshwar Municipality', 'district_id' => 3],
            ['name' => 'Budhanilkantha Municipality', 'district_id' => 3],
            ['name' => 'Kritipur Municipality', 'district_id' => 3],
            ['name' => 'Jwalamukhi Municipality', 'district_id' => 3],
            ['name' => 'Kageshwori-Manohara Municipality', 'district_id' => 3],
            ['name' => 'Tokha Municipality', 'district_id' => 3],
            ['name' => 'Patan Municipality', 'district_id' => 3],
            ['name' => 'Balkot Municipality', 'district_id' => 3],
            ['name' => 'Harisiddhi Municipality', 'district_id' => 3],
            ['name' => 'Lalitpur Rural Municipality', 'district_id' => 3],
            ['name' => 'Patan Rural Municipality', 'district_id' => 3],
            ['name' => 'Madhyapur Rural Municipality', 'district_id' => 3],
            ['name' => 'Mahalaxmi Rural Municipality', 'district_id' => 3],
            ['name' => 'Sundarijal Rural Municipality', 'district_id' => 3],

            // Kavrepalanchok District (ID: 4)
            ['name' => 'Dhulikhel Municipality', 'district_id' => 4],
            ['name' => 'Panauti Municipality', 'district_id' => 4],
            ['name' => 'Banepa Municipality', 'district_id' => 4],
            ['name' => 'Mandandeupur Municipality', 'district_id' => 4],
            ['name' => 'Kavre Rural Municipality', 'district_id' => 4],
            ['name' => 'Siddhipur Rural Municipality', 'district_id' => 4],
            ['name' => 'Nalang Rural Municipality', 'district_id' => 4],
            ['name' => 'Panchkhal Rural Municipality', 'district_id' => 4],
            ['name' => 'Bhumlu Rural Municipality', 'district_id' => 4],
            ['name' => 'Bhaktapur Rural Municipality', 'district_id' => 4],

            // Sindhupalchok District (ID: 5)
            ['name' => 'Chautara Municipality', 'district_id' => 5],
            ['name' => 'Melamchi Municipality', 'district_id' => 5],
            ['name' => 'Barabise Municipality', 'district_id' => 5],
            ['name' => 'Jugal Municipality', 'district_id' => 5],
            ['name' => 'Sunkoshi Rural Municipality', 'district_id' => 5],
            ['name' => 'Bhotekoshi Rural Municipality', 'district_id' => 5],
            ['name' => 'Helambu Rural Municipality', 'district_id' => 5],
            ['name' => 'Gosaikunda Rural Municipality', 'district_id' => 5],
            ['name' => 'Fikal Rural Municipality', 'district_id' => 5],
            ['name' => 'Gongabu Rural Municipality', 'district_id' => 5],

            // Ramechhap District (ID: 6)
            ['name' => 'Ramechhap Municipality', 'district_id' => 6],
            ['name' => 'Manthali Municipality', 'district_id' => 6],
            ['name' => 'Dhunibesi Municipality', 'district_id' => 6],
            ['name' => 'Kulikhet Rural Municipality', 'district_id' => 6],
            ['name' => 'Gokulganga Rural Municipality', 'district_id' => 6],
            ['name' => 'Siddhicharan Rural Municipality', 'district_id' => 6],
            ['name' => 'Panchkhal Rural Municipality', 'district_id' => 6],
            ['name' => 'Makawanpur Rural Municipality', 'district_id' => 6],
            ['name' => 'Chhathar Rural Municipality', 'district_id' => 6],
            ['name' => 'Tamakoshi Rural Municipality', 'district_id' => 6],

            // Sindhuli District (ID: 7)
            ['name' => 'Sindhuli Municipality', 'district_id' => 7],
            ['name' => 'Damak Municipality', 'district_id' => 7],
            ['name' => 'Kamalamai Municipality', 'district_id' => 7],
            ['name' => 'Kuse Rural Municipality', 'district_id' => 7],
            ['name' => 'Bhiman Rural Municipality', 'district_id' => 7],
            ['name' => 'Sunkhani Rural Municipality', 'district_id' => 7],
            ['name' => 'Dikshya Rural Municipality', 'district_id' => 7],
            ['name' => 'Kamalamai Rural Municipality', 'district_id' => 7],
            ['name' => 'Majuwa Rural Municipality', 'district_id' => 7],

            // Dolakha District (ID: 8)
            ['name' => 'Charikot Municipality', 'district_id' => 8],
            ['name' => 'Dolakha Municipality', 'district_id' => 8],
            ['name' => 'Gaurishankar Rural Municipality', 'district_id' => 8],
            ['name' => 'Baiteshwor Rural Municipality', 'district_id' => 8],
            ['name' => 'Kuri Rural Municipality', 'district_id' => 8],
            ['name' => 'Bhirkot Rural Municipality', 'district_id' => 8],
            ['name' => 'Bigu Rural Municipality', 'district_id' => 8],
            ['name' => 'Kiratkot Rural Municipality', 'district_id' => 8],

            // Rautahat District (ID: 9)
            ['name' => 'Gaur Municipality', 'district_id' => 9],
            ['name' => 'Junkiri Municipality', 'district_id' => 9],
            ['name' => 'Garuda Municipality', 'district_id' => 9],
            ['name' => 'Rautahat Municipality', 'district_id' => 9],
            ['name' => 'Rajpur Municipality', 'district_id' => 9],
            ['name' => 'Kawal Rural Municipality', 'district_id' => 9],
            ['name' => 'Ishworpur Rural Municipality', 'district_id' => 9],
            ['name' => 'Durga Bhagwati Rural Municipality', 'district_id' => 9],
            ['name' => 'Paroha Rural Municipality', 'district_id' => 9],
            ['name' => 'Patan Rural Municipality', 'district_id' => 9],

            // Mahottari District (ID: 10)
            ['name' => 'Jaleshwar Municipality', 'district_id' => 10],
            ['name' => 'Mahottari Municipality', 'district_id' => 10],
            ['name' => 'Sakti Rural Municipality', 'district_id' => 10],
            ['name' => 'Loharpatti Rural Municipality', 'district_id' => 10],
            ['name' => 'Aurahi Rural Municipality', 'district_id' => 10],
            ['name' => 'Bharati Rural Municipality', 'district_id' => 10],
            ['name' => 'Kshamal Rural Municipality', 'district_id' => 10],
            ['name' => 'Gaushala Rural Municipality', 'district_id' => 10],

            // Dhanusa District (ID: 11)
            ['name' => 'Janakpur Sub-Metropolitan City', 'district_id' => 11],
            ['name' => 'Dhanusha Municipality', 'district_id' => 11],
            ['name' => 'Mithila Municipality', 'district_id' => 11],
            ['name' => 'Lahan Municipality', 'district_id' => 11],
            ['name' => 'Sabaila Municipality', 'district_id' => 11],
            ['name' => 'Balawa Rural Municipality', 'district_id' => 11],
            ['name' => 'Bhagwanpur Rural Municipality', 'district_id' => 11],
            ['name' => 'Dhankuta Rural Municipality', 'district_id' => 11],
            ['name' => 'Haami Rural Municipality', 'district_id' => 11],
            ['name' => 'Shree Krishna Rural Municipality', 'district_id' => 11],

            // Bara District (ID: 12)
            ['name' => 'Birgunj Metropolitan City', 'district_id' => 12],
            ['name' => 'Kalaiya Municipality', 'district_id' => 12],
            ['name' => 'Simara Municipality', 'district_id' => 12],
            ['name' => 'Kalyanpur Municipality', 'district_id' => 12],
            ['name' => 'Patan Municipality', 'district_id' => 12],
            ['name' => 'Bishrampur Rural Municipality', 'district_id' => 12],
            ['name' => 'Fattepur Rural Municipality', 'district_id' => 12],
            ['name' => 'Nijgadh Rural Municipality', 'district_id' => 12],
            ['name' => 'Pachhwai Rural Municipality', 'district_id' => 12],
            ['name' => 'Rupaidiha Rural Municipality', 'district_id' => 12],

            // Sarlahi District (ID: 13)
            ['name' => 'Malangawa Municipality', 'district_id' => 13],
            ['name' => 'Hariharpur Municipality', 'district_id' => 13],
            ['name' => 'Ishwarpur Municipality', 'district_id' => 13],
            ['name' => 'Sarlahi Municipality', 'district_id' => 13],
            ['name' => 'Barhathwa Rural Municipality', 'district_id' => 13],
            ['name' => 'Laxmanpur Rural Municipality', 'district_id' => 13],
            ['name' => 'Sidheshwar Rural Municipality', 'district_id' => 13],
            ['name' => 'Shivnarayan Rural Municipality', 'district_id' => 13],
            ['name' => 'Urmia Rural Municipality', 'district_id' => 13],

            // Mahottari District (ID: 14)
            ['name' => 'Bara Municipality', 'district_id' => 14],
            ['name' => 'Sarlahi Municipality', 'district_id' => 14],
            ['name' => 'Jaleshwar Municipality', 'district_id' => 14],
            ['name' => 'Gaushala Municipality', 'district_id' => 14],
            ['name' => 'Siddhicharan Municipality', 'district_id' => 14],
            ['name' => 'Kusheshwarsthan Rural Municipality', 'district_id' => 14],
            ['name' => 'Brahmapur Rural Municipality', 'district_id' => 14],
            ['name' => 'Mahottari Rural Municipality', 'district_id' => 14],
            ['name' => 'Ishworpur Rural Municipality', 'district_id' => 14],
            ['name' => 'Pachmarhi Rural Municipality', 'district_id' => 14],

            //Province
            // Chitwan District (ID: 1)
            ['name' => 'Bharatpur Metropolitan City', 'district_id' => 1],
            ['name' => 'Ratnanagar Municipality', 'district_id' => 1],
            ['name' => 'Khairahani Municipality', 'district_id' => 1],
            ['name' => 'Madi Municipality', 'district_id' => 1],
            ['name' => 'Kawasoti Municipality', 'district_id' => 1],
            ['name' => 'Patan Municipality', 'district_id' => 1],
            ['name' => 'Bishalnagar Rural Municipality', 'district_id' => 1],
            ['name' => 'Ichchhakamana Rural Municipality', 'district_id' => 1],
            ['name' => 'Kalaiya Rural Municipality', 'district_id' => 1],

            // Nawalpur District (ID: 2)
            ['name' => 'Siddharthnagar Municipality', 'district_id' => 2],
            ['name' => 'Wagla Municipality', 'district_id' => 2],
            ['name' => 'Rashtriya Municipality', 'district_id' => 2],
            ['name' => 'Devchuli Municipality', 'district_id' => 2],
            ['name' => 'Kushma Municipality', 'district_id' => 2],
            ['name' => 'Madhav Rural Municipality', 'district_id' => 2],
            ['name' => 'Gitanagar Rural Municipality', 'district_id' => 2],

            // Tanahun District (ID: 3)
            ['name' => 'Damauli Municipality', 'district_id' => 3],
            ['name' => 'Byas Municipality', 'district_id' => 3],
            ['name' => 'Bandipur Municipality', 'district_id' => 3],
            ['name' => 'Kailash Rural Municipality', 'district_id' => 3],
            ['name' => 'Khudi Rural Municipality', 'district_id' => 3],
            ['name' => 'Sundaradevi Rural Municipality', 'district_id' => 3],

            // Syangja District (ID: 4)
            ['name' => 'Syangja Municipality', 'district_id' => 4],
            ['name' => 'Waling Municipality', 'district_id' => 4],
            ['name' => 'Phedikhola Municipality', 'district_id' => 4],
            ['name' => 'Kaski Rural Municipality', 'district_id' => 4],
            ['name' => 'Chandani Rural Municipality', 'district_id' => 4],
            ['name' => 'Annapurna Rural Municipality', 'district_id' => 4],

            // Baglung District (ID: 5)
            ['name' => 'Baglung Municipality', 'district_id' => 5],
            ['name' => 'Dhorpatan Municipality', 'district_id' => 5],
            ['name' => 'Jaimini Municipality', 'district_id' => 5],
            ['name' => 'Galkot Municipality', 'district_id' => 5],
            ['name' => 'Barpak Rural Municipality', 'district_id' => 5],
            ['name' => 'Dhorpatan Rural Municipality', 'district_id' => 5],
            ['name' => 'Taman Rural Municipality', 'district_id' => 5],

            // Parbat District (ID: 6)
            ['name' => 'Kusma Municipality', 'district_id' => 6],
            ['name' => 'Bihadi Municipality', 'district_id' => 6],
            ['name' => 'Jaljala Municipality', 'district_id' => 6],
            ['name' => 'Ruma Rural Municipality', 'district_id' => 6],
            ['name' => 'Mahashila Rural Municipality', 'district_id' => 6],
            ['name' => 'Siddhartha Rural Municipality', 'district_id' => 6],

            // Nuwakot District (ID: 7)
            ['name' => 'Bidur Municipality', 'district_id' => 7],
            ['name' => 'Tadi Municipality', 'district_id' => 7],
            ['name' => 'Dharmasthali Rural Municipality', 'district_id' => 7],
            ['name' => 'Dikharpu Rural Municipality', 'district_id' => 7],
            ['name' => 'Nuwakot Rural Municipality', 'district_id' => 7],

            // Gorkha District (ID: 8)
            ['name' => 'Gorkha Municipality', 'district_id' => 8],
            ['name' => 'Sambhunath Municipality', 'district_id' => 8],
            ['name' => 'Barpak Rural Municipality', 'district_id' => 8],
            ['name' => 'Meluwa Rural Municipality', 'district_id' => 8],
            ['name' => 'Palungtar Rural Municipality', 'district_id' => 8],

            // Lamjung District (ID: 9)
            ['name' => 'Besisahar Municipality', 'district_id' => 9],
            ['name' => 'Dhamilikuwa Municipality', 'district_id' => 9],
            ['name' => 'Besisahar Municipality', 'district_id' => 9],
            ['name' => 'Sarangkhola Rural Municipality', 'district_id' => 9],
            ['name' => 'Khimti Rural Municipality', 'district_id' => 9],

            // Manang District (ID: 10)
            ['name' => 'Chame Rural Municipality', 'district_id' => 10],
            ['name' => 'Nar Village Municipality', 'district_id' => 10],
            ['name' => 'Manang Rural Municipality', 'district_id' => 10],
            ['name' => 'Taal Rural Municipality', 'district_id' => 10],

            // Mustang District (ID: 11)
            ['name' => 'Jomsom Municipality', 'district_id' => 11],
            ['name' => 'Muktinath Municipality', 'district_id' => 11],
            ['name' => 'Lomanthang Rural Municipality', 'district_id' => 11],
            ['name' => 'Kagbeni Rural Municipality', 'district_id' => 11],

            // Kaski District (ID: 12)
            ['name' => 'Pokhara Metropolitan City', 'district_id' => 12],
            ['name' => 'Madi Municipality', 'district_id' => 12],
            ['name' => 'Annapurna Rural Municipality', 'district_id' => 12],
            ['name' => 'Ghandruk Rural Municipality', 'district_id' => 12],

            // Parbat District (ID: 13)
            ['name' => 'Dhorpatan Municipality', 'district_id' => 13],
            ['name' => 'Rukum Rural Municipality', 'district_id' => 13],
            ['name' => 'Ranimahal Rural Municipality', 'district_id' => 13],

            // Syangja District (ID: 14)
            ['name' => 'Beni Municipality', 'district_id' => 14],
            ['name' => 'Arghau Rural Municipality', 'district_id' => 14],
            ['name' => 'Chitre Rural Municipality', 'district_id' => 14],
            ['name' => 'Kalikot Rural Municipality', 'district_id' => 14],

            //province 5
             // Rupandehi District (ID: 1)
             ['name' => 'Butwal Sub-Metropolitan City', 'district_id' => 1],
             ['name' => 'Bhairahawa Municipality', 'district_id' => 1],
             ['name' => 'Lumbini Municipality', 'district_id' => 1],
             ['name' => 'Sainamaina Municipality', 'district_id' => 1],
             ['name' => 'Siddharthnagar Municipality', 'district_id' => 1],
             ['name' => 'Bhairahawa Rural Municipality', 'district_id' => 1],
             ['name' => 'Buddhabhumi Rural Municipality', 'district_id' => 1],
             ['name' => 'Madhyabindu Rural Municipality', 'district_id' => 1],

             // Kapilvastu District (ID: 2)
             ['name' => 'Taulihawa Municipality', 'district_id' => 2],
             ['name' => 'Shivaraj Municipality', 'district_id' => 2],
             ['name' => 'Banganga Municipality', 'district_id' => 2],
             ['name' => 'Suddhodhan Rural Municipality', 'district_id' => 2],
             ['name' => 'Maharajganj Rural Municipality', 'district_id' => 2],
             ['name' => 'Kushma Rural Municipality', 'district_id' => 2],

             // Palpa District (ID: 3)
             ['name' => 'Tansen Municipality', 'district_id' => 3],
             ['name' => 'Rani Gunj Municipality', 'district_id' => 3],
             ['name' => 'Nayapul Municipality', 'district_id' => 3],
             ['name' => 'Satyawati Rural Municipality', 'district_id' => 3],
             ['name' => 'Madi Rural Municipality', 'district_id' => 3],
             ['name' => 'Jwalamukhi Rural Municipality', 'district_id' => 3],

             // Nawalparasi District (ID: 4)
             ['name' => 'Gaidahawa Municipality', 'district_id' => 4],
             ['name' => 'Bardaghat Municipality', 'district_id' => 4],
             ['name' => 'Nayabazar Municipality', 'district_id' => 4],
             ['name' => 'Ramgram Municipality', 'district_id' => 4],
             ['name' => 'Sunwal Municipality', 'district_id' => 4],
             ['name' => 'Parasi Rural Municipality', 'district_id' => 4],
             ['name' => 'Kawasoti Rural Municipality', 'district_id' => 4],

             // Dang District (ID: 5)
             ['name' => 'Ghorahi Sub-Metropolitan City', 'district_id' => 5],
             ['name' => 'Tulasipur Municipality', 'district_id' => 5],
             ['name' => 'Rupandehi Municipality', 'district_id' => 5],
             ['name' => 'Gothgaun Rural Municipality', 'district_id' => 5],
             ['name' => 'Rajpur Rural Municipality', 'district_id' => 5],
             ['name' => 'Bansgadhi Rural Municipality', 'district_id' => 5],

             // Bardiya District (ID: 6)
             ['name' => 'Nepalgunj Sub-Metropolitan City', 'district_id' => 6],
             ['name' => 'Thakurbaba Municipality', 'district_id' => 6],
             ['name' => 'Rajapur Municipality', 'district_id' => 6],
             ['name' => 'Gulariya Municipality', 'district_id' => 6],
             ['name' => 'Bardiya Rural Municipality', 'district_id' => 6],
             ['name' => 'Geruwa Rural Municipality', 'district_id' => 6],

             // Rukum District (ID: 7)
             ['name' => 'Sakla Rural Municipality', 'district_id' => 7],
             ['name' => 'Satyawati Rural Municipality', 'district_id' => 7],
             ['name' => 'Pachhunga Rural Municipality', 'district_id' => 7],

             // Arghakhanchi District (ID: 8)
             ['name' => 'Sandhikharka Municipality', 'district_id' => 8],
             ['name' => 'Pipaladi Municipality', 'district_id' => 8],
             ['name' => 'Thabang Rural Municipality', 'district_id' => 8],
             ['name' => 'Kandebas Rural Municipality', 'district_id' => 8],

             // Palpa District (ID: 9)
             ['name' => 'Tansen Municipality', 'district_id' => 9],
             ['name' => 'Kusma Municipality', 'district_id' => 9],
             ['name' => 'Dhorpatan Municipality', 'district_id' => 9],
             ['name' => 'Madhyabindu Rural Municipality', 'district_id' => 9],

             // Banke District (ID: 10)
             ['name' => 'Nepalgunj Sub-Metropolitan City', 'district_id' => 10],
             ['name' => 'Kohalpur Municipality', 'district_id' => 10],
             ['name' => 'Rapti Rural Municipality', 'district_id' => 10],
             ['name' => 'Balarampur Rural Municipality', 'district_id' => 10],

             // Dailekh District (ID: 11)
             ['name' => 'Dailekh Municipality', 'district_id' => 11],
             ['name' => 'Chaurpati Rural Municipality', 'district_id' => 11],
             ['name' => 'Dullu Municipality', 'district_id' => 11],
             ['name' => 'Kalimati Rural Municipality', 'district_id' => 11],

             // Jajarkot District (ID: 12)
             ['name' => 'Jajarkot Municipality', 'district_id' => 12],
             ['name' => 'Chhedagad Municipality', 'district_id' => 12],
             ['name' => 'Himalaya Rural Municipality', 'district_id' => 12],
             ['name' => 'Kushma Rural Municipality', 'district_id' => 12],

             //province 6
             // Kailali District (ID: 1)
            ['name' => 'Dhangadhi Sub-Metropolitan City', 'district_id' => 1],
            ['name' => 'Mahakali Municipality', 'district_id' => 1],
            ['name' => 'Tikapur Municipality', 'district_id' => 1],
            ['name' => 'Gadkhet Rural Municipality', 'district_id' => 1],
            ['name' => 'Kailari Rural Municipality', 'district_id' => 1],
            ['name' => 'Patarasi Rural Municipality', 'district_id' => 1],

            // Kanchanpur District (ID: 2)
            ['name' => 'Mahendranagar Municipality', 'district_id' => 2],
            ['name' => 'Bhimphedi Municipality', 'district_id' => 2],
            ['name' => 'Krishnapur Municipality', 'district_id' => 2],
            ['name' => 'Shuklaphanta Rural Municipality', 'district_id' => 2],
            ['name' => 'Dodharachandani Rural Municipality', 'district_id' => 2],

            // Baitadi District (ID: 3)
            ['name' => 'Baitadi Municipality', 'district_id' => 3],
            ['name' => 'Siddheshwar Municipality', 'district_id' => 3],
            ['name' => 'Melauli Municipality', 'district_id' => 3],
            ['name' => 'Patan Rural Municipality', 'district_id' => 3],
            ['name' => 'Surnaya Rural Municipality', 'district_id' => 3],

            // Darchula District (ID: 4)
            ['name' => 'Darchula Municipality', 'district_id' => 4],
            ['name' => 'Mahakali Rural Municipality', 'district_id' => 4],
            ['name' => 'Naukwai Rural Municipality', 'district_id' => 4],

            // Dadeldhura District (ID: 5)
            ['name' => 'Dadeldhura Municipality', 'district_id' => 5],
            ['name' => 'Bhageshwor Rural Municipality', 'district_id' => 5],
            ['name' => 'Amargadhi Rural Municipality', 'district_id' => 5],

            // Bajura District (ID: 6)
            ['name' => 'Martadi Municipality', 'district_id' => 6],
            ['name' => 'Bajura Rural Municipality', 'district_id' => 6],

            // Bajhang District (ID: 7)
            ['name' => 'Bajhang Municipality', 'district_id' => 7],
            ['name' => 'Bungal Rural Municipality', 'district_id' => 7],

            // Humla District (ID: 8)
            ['name' => 'Simkot Municipality', 'district_id' => 8],
            ['name' => 'Keraunja Rural Municipality', 'district_id' => 8],

            // Mugu District (ID: 9)
            ['name' => 'Mugu Municipality', 'district_id' => 9],
            ['name' => 'Soru Rural Municipality', 'district_id' => 9],

            // Rukum (West) District (ID: 10)
            ['name' => 'Chaurjahari Municipality', 'district_id' => 10],
            ['name' => 'Rukumkot Municipality', 'district_id' => 10],
            ['name' => 'Putha Uttarganga Rural Municipality', 'district_id' => 10],

            // Rukum (East) District (ID: 11)
            ['name' => 'Rukumkot Municipality', 'district_id' => 11],
            ['name' => 'Khamkuda Rural Municipality', 'district_id' => 11],

            // Rolpa District (ID: 12)
            ['name' => 'Rolpa Municipality', 'district_id' => 12],
            ['name' => 'Runtigadhi Rural Municipality', 'district_id' => 12],
            ['name' => 'Thabang Rural Municipality', 'district_id' => 12],

            //Province 7
               // Kanchanpur District (ID: 1)
               ['name' => 'Mahendranagar Municipality', 'district_id' => 1],
               ['name' => 'Bhimphedi Municipality', 'district_id' => 1],
               ['name' => 'Krishnapur Municipality', 'district_id' => 1],
               ['name' => 'Shuklaphanta Rural Municipality', 'district_id' => 1],
               ['name' => 'Dodharachandani Rural Municipality', 'district_id' => 1],

               // Baitadi District (ID: 2)
               ['name' => 'Baitadi Municipality', 'district_id' => 2],
               ['name' => 'Siddheshwar Municipality', 'district_id' => 2],
               ['name' => 'Melauli Municipality', 'district_id' => 2],
               ['name' => 'Patan Rural Municipality', 'district_id' => 2],
               ['name' => 'Surnaya Rural Municipality', 'district_id' => 2],

               // Darchula District (ID: 3)
               ['name' => 'Darchula Municipality', 'district_id' => 3],
               ['name' => 'Mahakali Rural Municipality', 'district_id' => 3],
               ['name' => 'Naukwai Rural Municipality', 'district_id' => 3],

               // Dadeldhura District (ID: 4)
               ['name' => 'Dadeldhura Municipality', 'district_id' => 4],
               ['name' => 'Bhageshwor Rural Municipality', 'district_id' => 4],
               ['name' => 'Amargadhi Rural Municipality', 'district_id' => 4],

               // Bajura District (ID: 5)
               ['name' => 'Martadi Municipality', 'district_id' => 5],
               ['name' => 'Bajura Rural Municipality', 'district_id' => 5],

               // Bajhang District (ID: 6)
               ['name' => 'Bajhang Municipality', 'district_id' => 6],
               ['name' => 'Bungal Rural Municipality', 'district_id' => 6],

               // Humla District (ID: 7)
               ['name' => 'Simkot Municipality', 'district_id' => 7],
               ['name' => 'Keraunja Rural Municipality', 'district_id' => 7],

               // Mugu District (ID: 8)
               ['name' => 'Mugu Municipality', 'district_id' => 8],
               ['name' => 'Soru Rural Municipality', 'district_id' => 8],

               // Rukum (West) District (ID: 9)
               ['name' => 'Chaurjahari Municipality', 'district_id' => 9],
               ['name' => 'Rukumkot Municipality', 'district_id' => 9],
               ['name' => 'Putha Uttarganga Rural Municipality', 'district_id' => 9],

               // Rukum (East) District (ID: 10)
               ['name' => 'Rukumkot Municipality', 'district_id' => 10],
               ['name' => 'Khamkuda Rural Municipality', 'district_id' => 10],

               // Rolpa District (ID: 11)
               ['name' => 'Rolpa Municipality', 'district_id' => 11],
               ['name' => 'Runtigadhi Rural Municipality', 'district_id' => 11],
               ['name' => 'Thabang Rural Municipality', 'district_id' => 11],


        ];

        foreach ($localBodies as $localBody) {
            LocalBody::create($localBody);
        }
    }
}
