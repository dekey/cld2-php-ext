## Compact Language Detector 2 PHP Extension

This extension wraps [CLD2](https://code.google.com/p/cld2/) (Compact Language Detector 2) that detects over 80 languages in Unicode UTF-8 text.

## Usage

### Detector

```php
$cld2 = new \CLD2Detector();

$cld2->setTldHint('it'); // optional, hints about the Top level domain (it: italian, fr: french, de: german etc..)
$cld2->setLanguageHint(CLD2Language::GERMAN); // optional, hints about the language.
$cld2->setEncodingHint(CLD2Encoding::UTF8); // optional, hints about text encoding
 
var_dump($cld2->detect('My name is Melissa'));

// Output
array(5) {
  'language_id' =>
  int(0)
  'language_code' =>
  string(2) "en"
  'language_name' =>
  string(7) "ENGLISH"
  'language_probability' =>
  int(95)
  'is_reliable' =>
  bool(true)
}

```


### Language

Get language name from Language id
```php
$lang = CLD2Language::PAMPANGA;
echo CLD2Language::languageName($lang);

// Output
string(8) "PAMPANGA"
```

Get language code from Language id
```php
echo CLD2Language::languageCode(CLD2Language::PAMPANGA);

// Output
string(3) "pam"
```

Get language id from name where Name can be either full name or ISO code, or can be ISO code embedded in a language-script combination such as "en-Latn-GB"
```php
echo CLD2Language::getLanguageFromName('PAMPANGA');
// or
echo CLD2Language::getLanguageFromName('pam');

// Output
int(176)
``` 
 
### Encoding

Get encoding name from id
```php
$enc = CLD2Encoding::UTF8;
echo CLD2Encoding::encodingName($enc);

// Output
string(4) "UTF8"
```

## Installation

## From PECL
Not submitted yet.

## Build from source

First of all clone current repository and enter into its directory.

```bash
git clone git@github.com:fntlnz/cld2-php-ext.git
cd cld2-php-ext
```

**Compile CLD2 library**

For downloading from scratch

```bash
wget -nv -O - https://github.com/CLD2Owners/cld2/archive/master.tar.gz | tar zx

```

If not use next 

```bash
cd cld2-master/internal
CFLAGS="-Wno-narrowing -O3"  ./compile_libs.sh
sudo cp libcld2_full.so /usr/local/lib/libcld2.so
```

**Compile CLD2 PHP extension**

Come back to the `cld2-php-ext` directory and execute:

```bash
phpize
./configure --with-cld2=cld2-master
make -j
sudo make install
```

##### NOTES
- `./configure --with-cld2=libcld2` here `libcld2` is folder name with plugin in my case it is `cld2-master` 
- look at `./configure` file at line ~4017. search for `PHP_CLD2`
- look at `internal/compact_lang_det_impl.h`

Do not forget to add `extension=cld2.so` to your PHP ini.


## Contributing
See [CONTRIBUTING.md](CONTRIBUTING.md)

## NOTES

- [CLD2 library](https://code.google.com/p/cld2)
- [CLD2 full version](https://code.google.com/p/cld2/wiki/CLD2FullVersion)

[![Analytics](https://ga-beacon.appspot.com/UA-45983436-1/fntlnz/cld2-php-ext)](https://github.com/igrigorik/ga-beacon)
