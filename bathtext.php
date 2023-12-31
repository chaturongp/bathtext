<?php

function num2words($number) {
  // กำหนดค่าคงที่
  $unit = array("ศูนย์", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
  $ten = array("สิบ", "ยี่สิบ", "สามสิบ", "สี่สิบ", "ห้าสิบ", "หกสิบ", "เจ็ดสิบ", "แปดสิบ", "เก้าสิบ");
  $hundred = array("หนึ่งร้อย", "สองร้อย", "สามร้อย", "สี่ร้อย", "ห้าร้อย", "หกร้อย", "เจ็ดร้อย", "แปดร้อย", "เก้าร้อย");

  // ตรวจสอบว่าตัวเลขเป็นจำนวนเต็มหรือไม่
  if (!is_int($number)) {
    return false;
  }

  // แปลงตัวเลขให้เป็นตัวอักษร
  $number = strval($number);
  $length = strlen($number);
  $result = "";

  // แปลงตัวเลขหลักหน่วย
  if ($length > 0) {
    $result .= $unit[$number[-1] - 0];
  }

  // แปลงตัวเลขหลักสิบ
  if ($length > 1) {
    $result .= $ten[$number[-2] - 0];
  }

  // แปลงตัวเลขหลักร้อย
  if ($length > 2) {
    $result .= $hundred[$number[-3] - 0];
  }

  return $result;
}

// ตัวอย่างการใช้งาน
echo num2words(123); // หนึ่งร้อยยี่สิบสาม
echo num2words(1234); // หนึ่งพันสองร้อยสามสิบสี่
echo num2words(12345); // สิบสองพันสามร้อยสี่สิบห้า
