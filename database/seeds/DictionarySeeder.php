<?php

use Facade\FlareClient\Stacktrace\File;
use Faker\Provider\File as ProviderFile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DictionarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dictionaries')->truncate();

        $items = [
            [
                [
                    'key'   => 'title',
                    'value' => 'Title',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'title',
                    'value' => 'სათაური',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'title',
                    'value' => 'Название',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'description',
                    'value' => 'Description',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'description',
                    'value' => 'აღწერა',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'description',
                    'value' => 'Описание',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'content',
                    'value' => 'Content',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'content',
                    'value' => 'კონტენტი',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'content',
                    'value' => 'Содержание',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'status',
                    'value' => 'Status',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'status',
                    'value' => 'სტატუსი',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'status',
                    'value' => 'Статус',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'email',
                    'value' => 'Email',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'email',
                    'value' => 'ელ-ფოსტა',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'email',
                    'value' => 'Эл. адрес',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'name',
                    'value' => 'Name',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'name',
                    'value' => 'სახელი',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'name',
                    'value' => 'Имя',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'first_name',
                    'value' => 'First Name',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'first_name',
                    'value' => 'სახელი',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'first_name',
                    'value' => 'Имя',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'last_name',
                    'value' => 'Last Name',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'last_name',
                    'value' => 'გვარი',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'last_name',
                    'value' => 'Фамилия',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'file_id',
                    'value' => 'File ID',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'file_id',
                    'value' => 'ფაილის კოდი',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'file_id',
                    'value' => 'ID файла',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'address',
                    'value' => 'Address',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'address',
                    'value' => 'მისამართი',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'address',
                    'value' => 'Адрес',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'contact_info',
                    'value' => 'Contact Info',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'contact_info',
                    'value' => 'საკონტაქტო ინფორომაცია',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'contact_info',
                    'value' => 'Контактная информация',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'phone',
                    'value' => 'Phone',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'phone',
                    'value' => 'ტელეფონი',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'phone',
                    'value' => 'Телефон',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'age',
                    'value' => 'Age',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'age',
                    'value' => 'ასაკი',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'age',
                    'value' => 'Возраст',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'deposit',
                    'value' => 'Deposit',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'deposit',
                    'value' => 'თანხა',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'deposit',
                    'value' => 'Депозит',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'default',
                    'value' => 'Default',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'default',
                    'value' => 'ძირითადი',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'default',
                    'value' => 'Базовый',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'native',
                    'value' => 'Native',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'native',
                    'value' => 'მშობლიური',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'native',
                    'value' => 'Родные',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'company',
                    'value' => 'Company',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'company',
                    'value' => 'კომპანია',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'company',
                    'value' => 'Компания',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'position',
                    'value' => 'Position',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'position',
                    'value' => 'პოზიცია',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'position',
                    'value' => 'Должность',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'abbreviation',
                    'value' => 'Abbreviation',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'abbreviation',
                    'value' => 'აბრევიატურა',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'abbreviation',
                    'value' => 'Сокращение',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'active',
                    'value' => 'Active',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'active',
                    'value' => 'აქტიური',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'active',
                    'value' => 'Активный',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'inactive',
                    'value' => 'Inactive',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'inactive',
                    'value' => 'შეჩერებული',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'inactive',
                    'value' => 'Остановлен',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'locale',
                    'value' => 'Local Designation',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'locale',
                    'value' => 'ლოკალური აღნიშვნა',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'locale',
                    'value' => 'Местное обозначение',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'working_hours',
                    'value' => 'Working Hours',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'working_hours',
                    'value' => 'სამუშაო საათები',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'working_hours',
                    'value' => 'Рабочие часы',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'contact',
                    'value' => 'Contact',
                    'module' => 'navigation',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'contact',
                    'value' => 'კონტაქტი',
                    'module' => 'navigation',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'contact',
                    'value' => 'Связаться с нами',
                    'module' => 'navigation',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'feedback',
                    'value' => 'Feedback',
                    'module' => 'navigation',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'feedback',
                    'value' => 'გამოხმაურება',
                    'module' => 'navigation',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'feedback',
                    'value' => 'Обратная связь',
                    'module' => 'navigation',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'about',
                    'value' => 'About Us',
                    'module' => 'navigation',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'about',
                    'value' => 'ჩვენს შესახებ',
                    'module' => 'navigation',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'about',
                    'value' => 'Насчет нас',
                    'module' => 'navigation',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'languages',
                    'value' => 'Languages',
                    'module' => 'navigation',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'languages',
                    'value' => 'ენები',
                    'module' => 'navigation',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'languages',
                    'value' => 'Языки',
                    'module' => 'navigation',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'dictionary',
                    'value' => 'Dictionary',
                    'module' => 'navigation',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'dictionary',
                    'value' => 'ლექსიკონი',
                    'module' => 'navigation',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'dictionary',
                    'value' => 'Словарь',
                    'module' => 'navigation',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'settings',
                    'value' => 'Settings',
                    'module' => 'navigation',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'settings',
                    'value' => 'პარამეტრები',
                    'module' => 'navigation',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'settings',
                    'value' => 'Параметры',
                    'module' => 'navigation',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'roles',
                    'value' => 'Roles',
                    'module' => 'navigation',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'roles',
                    'value' => 'პოზიციები',
                    'module' => 'navigation',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'roles',
                    'value' => 'Роли',
                    'module' => 'navigation',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'users',
                    'value' => 'Users',
                    'module' => 'navigation',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'users',
                    'value' => 'მომხმარებლები',
                    'module' => 'navigation',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'users',
                    'value' => 'Пользователи',
                    'module' => 'navigation',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'blog',
                    'value' => 'Blog',
                    'module' => 'navigation',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'blog',
                    'value' => 'ბლოგი',
                    'module' => 'navigation',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'blog',
                    'value' => 'Блог',
                    'module' => 'navigation',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'key',
                    'value' => 'Key',
                    'module' => 'dictionaries',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'key',
                    'value' => 'გასაღები',
                    'module' => 'dictionaries',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'key',
                    'value' => 'Ключ',
                    'module' => 'dictionaries',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'value',
                    'value' => 'Value',
                    'module' => 'dictionaries',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'value',
                    'value' => 'მნიშვნელობა',
                    'module' => 'dictionaries',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'value',
                    'value' => 'Значение',
                    'module' => 'dictionaries',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'module',
                    'value' => 'Module',
                    'module' => 'dictionaries',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'module',
                    'value' => 'მოდული',
                    'module' => 'dictionaries',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'module',
                    'value' => 'Модуль',
                    'module' => 'dictionaries',
                    'local_id' => '3'
                ],
            ],
            [
                [
                    'key'   => 'language',
                    'value' => 'Language',
                    'module' => 'dictionaries',
                    'local_id' => '2'
                ],
                [
                    'key'   => 'language',
                    'value' => 'ენა',
                    'module' => 'dictionaries',
                    'local_id' => '1'
                ],
                [
                    'key'   => 'language',
                    'value' => 'Язык',
                    'module' => 'dictionaries',
                    'local_id' => '3'
                ],
            ],

        ];

        foreach ($items as $item) {
            $record = App\Models\Dictionary::updateOrCreate($item[0]);

            if ($record) {
                $record->item_id = $record->id;
                $record->save();

                $item[1]['item_id'] = $record->id;
                $item[2]['item_id'] = $record->id;

                App\Models\Dictionary::updateOrCreate($item[1]);
                App\Models\Dictionary::updateOrCreate($item[2]);
            }
        }
    }
}
