<?php
namespace Admin\Types;

use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\DBAL\Platforms\AbstractPlatform;

/**
 * My custom datatype.
 */
class DateTimeUTC extends DateTimeType
{
	const NAME = 'datetimeutc'; // modify to match your type name

	public function convertToPHPValue($value, AbstractPlatform $platform)
	{
		if ($value === null || $value instanceof \DateTime) {
            return $value;
        }
		
		$value = explode('.', $value);
		$value = $value[0];
		
        $val = \DateTime::createFromFormat($platform->getDateTimeFormatString(), $value);
        
        if ( ! $val) {
            throw ConversionException::conversionFailedFormat($value, $this->getName(), $platform->getDateTimeFormatString());
        }
        return $val;
	}
	
	public function getName()
	{
		return self::NAME; // modify to match your constant name
	}
}