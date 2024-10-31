<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
/**
 * Translate ISO 3166-1 Country Codes to Country names and vice versa.
 *
 * @package PROP/API
 */

/**
 * Class PROP_Countries
 */
class PROP_Countries {

	/**
	 * The country list.
	 *
	 * @var array
	 */
	private static $countries = array();

	/**
	 * Populate the countries
	 */
	public static function populate() {

		self::$countries = array(
			'AF' => __( 'Afghanistan', 'Proweblook-phone-validator' ),
			'AL' => __( 'Albania', 'Proweblook-phone-validator' ),
			'DZ' => __( 'Algeria', 'Proweblook-phone-validator' ),
			'AS' => __( 'American Samoa', 'Proweblook-phone-validator' ),
			'AD' => __( 'Andorra', 'Proweblook-phone-validator' ),
			'AO' => __( 'Angola', 'Proweblook-phone-validator' ),
			'AI' => __( 'Anguilla', 'Proweblook-phone-validator' ),
			'AQ' => __( 'Antarctica', 'Proweblook-phone-validator' ),
			'AG' => __( 'Antigua & Barbuda', 'Proweblook-phone-validator' ),
			'AR' => __( 'Argentina', 'Proweblook-phone-validator' ),
			'AM' => __( 'Armenia', 'Proweblook-phone-validator' ),
			'AW' => __( 'Aruba', 'Proweblook-phone-validator' ),
			'AU' => __( 'Australia', 'Proweblook-phone-validator' ),
			'AT' => __( 'Austria', 'Proweblook-phone-validator' ),
			'AZ' => __( 'Azerbaijan', 'Proweblook-phone-validator' ),
			'BS' => __( 'Bahamas', 'Proweblook-phone-validator' ),
			'BH' => __( 'Bahrain', 'Proweblook-phone-validator' ),
			'BD' => __( 'Bangladesh', 'Proweblook-phone-validator' ),
			'BB' => __( 'Barbados', 'Proweblook-phone-validator' ),
			'BY' => __( 'Belarus', 'Proweblook-phone-validator' ),
			'BE' => __( 'Belgium', 'Proweblook-phone-validator' ),
			'BZ' => __( 'Belize', 'Proweblook-phone-validator' ),
			'BJ' => __( 'Benin', 'Proweblook-phone-validator' ),
			'BM' => __( 'Bermuda', 'Proweblook-phone-validator' ),
			'BT' => __( 'Bhutan', 'Proweblook-phone-validator' ),
			'BO' => __( 'Bolivia', 'Proweblook-phone-validator' ),
			'BA' => __( 'Bosnia', 'Proweblook-phone-validator' ),
			'BW' => __( 'Botswana', 'Proweblook-phone-validator' ),
			'BV' => __( 'Bouvet Island', 'Proweblook-phone-validator' ),
			'BR' => __( 'Brazil', 'Proweblook-phone-validator' ),
			'IO' => __( 'British Indian Ocean Territory', 'Proweblook-phone-validator' ),
			'VG' => __( 'British Virgin Islands', 'Proweblook-phone-validator' ),
			'BN' => __( 'Brunei', 'Proweblook-phone-validator' ),
			'BG' => __( 'Bulgaria', 'Proweblook-phone-validator' ),
			'BF' => __( 'Burkina Faso', 'Proweblook-phone-validator' ),
			'BI' => __( 'Burundi', 'Proweblook-phone-validator' ),
			'KH' => __( 'Cambodia', 'Proweblook-phone-validator' ),
			'CM' => __( 'Cameroon', 'Proweblook-phone-validator' ),
			'CA' => __( 'Canada', 'Proweblook-phone-validator' ),
			'CV' => __( 'Cape Verde', 'Proweblook-phone-validator' ),
			'BQ' => __( 'Caribbean Netherlands', 'Proweblook-phone-validator' ),
			'KY' => __( 'Cayman Islands', 'Proweblook-phone-validator' ),
			'CF' => __( 'Central African Republic', 'Proweblook-phone-validator' ),
			'TD' => __( 'Chad', 'Proweblook-phone-validator' ),
			'CL' => __( 'Chile', 'Proweblook-phone-validator' ),
			'CN' => __( 'China', 'Proweblook-phone-validator' ),
			'CX' => __( 'Christmas Island', 'Proweblook-phone-validator' ),
			'CC' => __( 'Cocos (Keeling) Islands', 'Proweblook-phone-validator' ),
			'CO' => __( 'Colombia', 'Proweblook-phone-validator' ),
			'KM' => __( 'Comoros', 'Proweblook-phone-validator' ),
			'CG' => __( 'Congo - Brazzaville', 'Proweblook-phone-validator' ),
			'CD' => __( 'Congo - Kinshasa', 'Proweblook-phone-validator' ),
			'CK' => __( 'Cook Islands', 'Proweblook-phone-validator' ),
			'CR' => __( 'Costa Rica', 'Proweblook-phone-validator' ),
			'HR' => __( 'Croatia', 'Proweblook-phone-validator' ),
			'CU' => __( 'Cuba', 'Proweblook-phone-validator' ),
			'CW' => __( 'Curaçao', 'Proweblook-phone-validator' ),
			'CY' => __( 'Cyprus', 'Proweblook-phone-validator' ),
			'CZ' => __( 'Czechia', 'Proweblook-phone-validator' ),
			'CI' => __( 'Côte d’Ivoire', 'Proweblook-phone-validator' ),
			'DK' => __( 'Denmark', 'Proweblook-phone-validator' ),
			'DJ' => __( 'Djibouti', 'Proweblook-phone-validator' ),
			'DM' => __( 'Dominica', 'Proweblook-phone-validator' ),
			'DO' => __( 'Dominican Republic', 'Proweblook-phone-validator' ),
			'EC' => __( 'Ecuador', 'Proweblook-phone-validator' ),
			'EG' => __( 'Egypt', 'Proweblook-phone-validator' ),
			'SV' => __( 'El Salvador', 'Proweblook-phone-validator' ),
			'GQ' => __( 'Equatorial Guinea', 'Proweblook-phone-validator' ),
			'ER' => __( 'Eritrea', 'Proweblook-phone-validator' ),
			'EE' => __( 'Estonia', 'Proweblook-phone-validator' ),
			'ET' => __( 'Ethiopia', 'Proweblook-phone-validator' ),
			'FK' => __( 'Falkland Islands', 'Proweblook-phone-validator' ),
			'FO' => __( 'Faroe Islands', 'Proweblook-phone-validator' ),
			'FJ' => __( 'Fiji', 'Proweblook-phone-validator' ),
			'FI' => __( 'Finland', 'Proweblook-phone-validator' ),
			'FR' => __( 'France', 'Proweblook-phone-validator' ),
			'GF' => __( 'French Guiana', 'Proweblook-phone-validator' ),
			'PF' => __( 'French Polynesia', 'Proweblook-phone-validator' ),
			'TF' => __( 'French Southern Territories', 'Proweblook-phone-validator' ),
			'GA' => __( 'Gabon', 'Proweblook-phone-validator' ),
			'GM' => __( 'Gambia', 'Proweblook-phone-validator' ),
			'GE' => __( 'Georgia', 'Proweblook-phone-validator' ),
			'DE' => __( 'Germany', 'Proweblook-phone-validator' ),
			'GH' => __( 'Ghana', 'Proweblook-phone-validator' ),
			'GI' => __( 'Gibraltar', 'Proweblook-phone-validator' ),
			'GR' => __( 'Greece', 'Proweblook-phone-validator' ),
			'GL' => __( 'Greenland', 'Proweblook-phone-validator' ),
			'GD' => __( 'Grenada', 'Proweblook-phone-validator' ),
			'GP' => __( 'Guadeloupe', 'Proweblook-phone-validator' ),
			'GU' => __( 'Guam', 'Proweblook-phone-validator' ),
			'GT' => __( 'Guatemala', 'Proweblook-phone-validator' ),
			'GG' => __( 'Guernsey', 'Proweblook-phone-validator' ),
			'GN' => __( 'Guinea', 'Proweblook-phone-validator' ),
			'GW' => __( 'Guinea-Bissau', 'Proweblook-phone-validator' ),
			'GY' => __( 'Guyana', 'Proweblook-phone-validator' ),
			'HT' => __( 'Haiti', 'Proweblook-phone-validator' ),
			'HM' => __( 'Heard & McDonald Islands', 'Proweblook-phone-validator' ),
			'HN' => __( 'Honduras', 'Proweblook-phone-validator' ),
			'HK' => __( 'Hong Kong', 'Proweblook-phone-validator' ),
			'HU' => __( 'Hungary', 'Proweblook-phone-validator' ),
			'IS' => __( 'Iceland', 'Proweblook-phone-validator' ),
			'IN' => __( 'India', 'Proweblook-phone-validator' ),
			'ID' => __( 'Indonesia', 'Proweblook-phone-validator' ),
			'IR' => __( 'Iran', 'Proweblook-phone-validator' ),
			'IQ' => __( 'Iraq', 'Proweblook-phone-validator' ),
			'IE' => __( 'Ireland', 'Proweblook-phone-validator' ),
			'IM' => __( 'Isle of Man', 'Proweblook-phone-validator' ),
			'IL' => __( 'Israel', 'Proweblook-phone-validator' ),
			'IT' => __( 'Italy', 'Proweblook-phone-validator' ),
			'JM' => __( 'Jamaica', 'Proweblook-phone-validator' ),
			'JP' => __( 'Japan', 'Proweblook-phone-validator' ),
			'JE' => __( 'Jersey', 'Proweblook-phone-validator' ),
			'JO' => __( 'Jordan', 'Proweblook-phone-validator' ),
			'KZ' => __( 'Kazakhstan', 'Proweblook-phone-validator' ),
			'KE' => __( 'Kenya', 'Proweblook-phone-validator' ),
			'KI' => __( 'Kiribati', 'Proweblook-phone-validator' ),
			'KW' => __( 'Kuwait', 'Proweblook-phone-validator' ),
			'KG' => __( 'Kyrgyzstan', 'Proweblook-phone-validator' ),
			'LA' => __( 'Laos', 'Proweblook-phone-validator' ),
			'LV' => __( 'Latvia', 'Proweblook-phone-validator' ),
			'LB' => __( 'Lebanon', 'Proweblook-phone-validator' ),
			'LS' => __( 'Lesotho', 'Proweblook-phone-validator' ),
			'LR' => __( 'Liberia', 'Proweblook-phone-validator' ),
			'LY' => __( 'Libya', 'Proweblook-phone-validator' ),
			'LI' => __( 'Liechtenstein', 'Proweblook-phone-validator' ),
			'LT' => __( 'Lithuania', 'Proweblook-phone-validator' ),
			'LU' => __( 'Luxembourg', 'Proweblook-phone-validator' ),
			'MO' => __( 'Macau', 'Proweblook-phone-validator' ),
			'MK' => __( 'Macedonia', 'Proweblook-phone-validator' ),
			'MG' => __( 'Madagascar', 'Proweblook-phone-validator' ),
			'MW' => __( 'Malawi', 'Proweblook-phone-validator' ),
			'MY' => __( 'Malaysia', 'Proweblook-phone-validator' ),
			'MV' => __( 'Maldives', 'Proweblook-phone-validator' ),
			'ML' => __( 'Mali', 'Proweblook-phone-validator' ),
			'MT' => __( 'Malta', 'Proweblook-phone-validator' ),
			'MH' => __( 'Marshall Islands', 'Proweblook-phone-validator' ),
			'MQ' => __( 'Martinique', 'Proweblook-phone-validator' ),
			'MR' => __( 'Mauritania', 'Proweblook-phone-validator' ),
			'MU' => __( 'Mauritius', 'Proweblook-phone-validator' ),
			'YT' => __( 'Mayotte', 'Proweblook-phone-validator' ),
			'MX' => __( 'Mexico', 'Proweblook-phone-validator' ),
			'FM' => __( 'Micronesia', 'Proweblook-phone-validator' ),
			'MD' => __( 'Moldova', 'Proweblook-phone-validator' ),
			'MC' => __( 'Monaco', 'Proweblook-phone-validator' ),
			'MN' => __( 'Mongolia', 'Proweblook-phone-validator' ),
			'ME' => __( 'Montenegro', 'Proweblook-phone-validator' ),
			'MS' => __( 'Montserrat', 'Proweblook-phone-validator' ),
			'MA' => __( 'Morocco', 'Proweblook-phone-validator' ),
			'MZ' => __( 'Mozambique', 'Proweblook-phone-validator' ),
			'MM' => __( 'Myanmar', 'Proweblook-phone-validator' ),
			'NA' => __( 'Namibia', 'Proweblook-phone-validator' ),
			'NR' => __( 'Nauru', 'Proweblook-phone-validator' ),
			'NP' => __( 'Nepal', 'Proweblook-phone-validator' ),
			'NL' => __( 'Netherlands', 'Proweblook-phone-validator' ),
			'NC' => __( 'New Caledonia', 'Proweblook-phone-validator' ),
			'NZ' => __( 'New Zealand', 'Proweblook-phone-validator' ),
			'NI' => __( 'Nicaragua', 'Proweblook-phone-validator' ),
			'NE' => __( 'Niger', 'Proweblook-phone-validator' ),
			'NG' => __( 'Nigeria', 'Proweblook-phone-validator' ),
			'NU' => __( 'Niue', 'Proweblook-phone-validator' ),
			'NF' => __( 'Norfolk Island', 'Proweblook-phone-validator' ),
			'KP' => __( 'North Korea', 'Proweblook-phone-validator' ),
			'MP' => __( 'Northern Mariana Islands', 'Proweblook-phone-validator' ),
			'NO' => __( 'Norway', 'Proweblook-phone-validator' ),
			'OM' => __( 'Oman', 'Proweblook-phone-validator' ),
			'PK' => __( 'Pakistan', 'Proweblook-phone-validator' ),
			'PW' => __( 'Palau', 'Proweblook-phone-validator' ),
			'PS' => __( 'Palestine', 'Proweblook-phone-validator' ),
			'PA' => __( 'Panama', 'Proweblook-phone-validator' ),
			'PG' => __( 'Papua New Guinea', 'Proweblook-phone-validator' ),
			'PY' => __( 'Paraguay', 'Proweblook-phone-validator' ),
			'PE' => __( 'Peru', 'Proweblook-phone-validator' ),
			'PH' => __( 'Philippines', 'Proweblook-phone-validator' ),
			'PN' => __( 'Pitcairn Islands', 'Proweblook-phone-validator' ),
			'PL' => __( 'Poland', 'Proweblook-phone-validator' ),
			'PT' => __( 'Portugal', 'Proweblook-phone-validator' ),
			'PR' => __( 'Puerto Rico', 'Proweblook-phone-validator' ),
			'QA' => __( 'Qatar', 'Proweblook-phone-validator' ),
			'RO' => __( 'Romania', 'Proweblook-phone-validator' ),
			'RU' => __( 'Russia', 'Proweblook-phone-validator' ),
			'RW' => __( 'Rwanda', 'Proweblook-phone-validator' ),
			'RE' => __( 'Réunion', 'Proweblook-phone-validator' ),
			'WS' => __( 'Samoa', 'Proweblook-phone-validator' ),
			'SM' => __( 'San Marino', 'Proweblook-phone-validator' ),
			'SA' => __( 'Saudi Arabia', 'Proweblook-phone-validator' ),
			'SN' => __( 'Senegal', 'Proweblook-phone-validator' ),
			'RS' => __( 'Serbia', 'Proweblook-phone-validator' ),
			'SC' => __( 'Seychelles', 'Proweblook-phone-validator' ),
			'SL' => __( 'Sierra Leone', 'Proweblook-phone-validator' ),
			'SG' => __( 'Singapore', 'Proweblook-phone-validator' ),
			'SX' => __( 'Sint Maarten', 'Proweblook-phone-validator' ),
			'SK' => __( 'Slovakia', 'Proweblook-phone-validator' ),
			'SI' => __( 'Slovenia', 'Proweblook-phone-validator' ),
			'SB' => __( 'Solomon Islands', 'Proweblook-phone-validator' ),
			'SO' => __( 'Somalia', 'Proweblook-phone-validator' ),
			'ZA' => __( 'South Africa', 'Proweblook-phone-validator' ),
			'GS' => __( 'South Georgia & South Sandwich Islands', 'Proweblook-phone-validator' ),
			'KR' => __( 'South Korea', 'Proweblook-phone-validator' ),
			'SS' => __( 'South Sudan', 'Proweblook-phone-validator' ),
			'ES' => __( 'Spain', 'Proweblook-phone-validator' ),
			'LK' => __( 'Sri Lanka', 'Proweblook-phone-validator' ),
			'BL' => __( 'St. Barthélemy', 'Proweblook-phone-validator' ),
			'SH' => __( 'St. Helena', 'Proweblook-phone-validator' ),
			'KN' => __( 'St. Kitts & Nevis', 'Proweblook-phone-validator' ),
			'LC' => __( 'St. Lucia', 'Proweblook-phone-validator' ),
			'MF' => __( 'St. Martin', 'Proweblook-phone-validator' ),
			'PM' => __( 'St. Pierre & Miquelon', 'Proweblook-phone-validator' ),
			'VC' => __( 'St. Vincent & Grenadines', 'Proweblook-phone-validator' ),
			'SD' => __( 'Sudan', 'Proweblook-phone-validator' ),
			'SR' => __( 'Suriname', 'Proweblook-phone-validator' ),
			'SJ' => __( 'Svalbard & Jan Mayen', 'Proweblook-phone-validator' ),
			'SZ' => __( 'Swaziland', 'Proweblook-phone-validator' ),
			'SE' => __( 'Sweden', 'Proweblook-phone-validator' ),
			'CH' => __( 'Switzerland', 'Proweblook-phone-validator' ),
			'SY' => __( 'Syria', 'Proweblook-phone-validator' ),
			'ST' => __( 'São Tomé & Príncipe', 'Proweblook-phone-validator' ),
			'TW' => __( 'Taiwan', 'Proweblook-phone-validator' ),
			'TJ' => __( 'Tajikistan', 'Proweblook-phone-validator' ),
			'TZ' => __( 'Tanzania', 'Proweblook-phone-validator' ),
			'TH' => __( 'Thailand', 'Proweblook-phone-validator' ),
			'TL' => __( 'Timor-Leste', 'Proweblook-phone-validator' ),
			'TG' => __( 'Togo', 'Proweblook-phone-validator' ),
			'TK' => __( 'Tokelau', 'Proweblook-phone-validator' ),
			'TO' => __( 'Tonga', 'Proweblook-phone-validator' ),
			'TT' => __( 'Trinidad & Tobago', 'Proweblook-phone-validator' ),
			'TN' => __( 'Tunisia', 'Proweblook-phone-validator' ),
			'TR' => __( 'Turkey', 'Proweblook-phone-validator' ),
			'TM' => __( 'Turkmenistan', 'Proweblook-phone-validator' ),
			'TC' => __( 'Turks & Caicos Islands', 'Proweblook-phone-validator' ),
			'TV' => __( 'Tuvalu', 'Proweblook-phone-validator' ),
			'UM' => __( 'U.S. Outlying Islands', 'Proweblook-phone-validator' ),
			'VI' => __( 'U.S. Virgin Islands', 'Proweblook-phone-validator' ),
			'GB' => __( 'UK', 'Proweblook-phone-validator' ),
			'US' => __( 'US', 'Proweblook-phone-validator' ),
			'UG' => __( 'Uganda', 'Proweblook-phone-validator' ),
			'UA' => __( 'Ukraine', 'Proweblook-phone-validator' ),
			'AE' => __( 'United Arab Emirates', 'Proweblook-phone-validator' ),
			'UY' => __( 'Uruguay', 'Proweblook-phone-validator' ),
			'UZ' => __( 'Uzbekistan', 'Proweblook-phone-validator' ),
			'VU' => __( 'Vanuatu', 'Proweblook-phone-validator' ),
			'VA' => __( 'Vatican City', 'Proweblook-phone-validator' ),
			'VE' => __( 'Venezuela', 'Proweblook-phone-validator' ),
			'VN' => __( 'Vietnam', 'Proweblook-phone-validator' ),
			'WF' => __( 'Wallis & Futuna', 'Proweblook-phone-validator' ),
			'EH' => __( 'Western Sahara', 'Proweblook-phone-validator' ),
			'YE' => __( 'Yemen', 'Proweblook-phone-validator' ),
			'ZM' => __( 'Zambia', 'Proweblook-phone-validator' ),
			'ZW' => __( 'Zimbabwe', 'Proweblook-phone-validator' ),
			'AX' => __( 'Åland Islands', 'Proweblook-phone-validator' ),
		);
	}

	/**
	 * Get list
	 *
	 * @return array
	 */
	public static function get_list() {
		return self::$countries;
	}


	/**
	 * Get the country by its code.
	 *
	 * @param string $code The country code.
	 *
	 * @return string
	 */
	public static function get_country( $code ) {

		return ( ! empty( self::$countries[ $code ] ) ) ? self::$countries[ $code ] : '';
	}

	/**
	 * Get the code of a country.
	 *
	 * @param string $country The country name.
	 *
	 * @return string
	 */
	public static function get_code( $country ) {

		$codes = array_flip( self::$countries );
		return ( ! empty( $codes[ $country ] ) ) ? $codes[ $country ] : '';
	}
}
