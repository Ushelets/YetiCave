<?php

/**
 * Создает подготовленное выражение на основе готового SQL запроса и переданных данных
 *
 * @param $link mysqli Ресурс соединения
 * @param $sql string SQL запрос с плейсхолдерами вместо значений
 * @param array $data Данные для вставки на место плейсхолдеров
 *
 * @return mysqli_stmt Подготовленное выражение
 */
function db_get_prepare_stmt($link, $sql, $data = [])
{
    $stmt = mysqli_prepare($link, $sql);

    if ($data) {
        $types = '';
        $stmt_data = [];
        foreach ($data as $value) {
            $type = null;

            if (is_int($value)) {
                $type = 'i';
            } else if (is_string($value)) {
                $type = 's';
            } else if (is_double($value)) {
                $type = 'd';
            }

            if ($type) {
                $types .= $type;
                $stmt_data[] = $value;
            }
        }

        $values = array_merge([$stmt, $types], $stmt_data);
        $func = 'mysqli_stmt_bind_param';
        $func(...$values);
    }
    return $stmt;
};

function imgName($img_err, $nam)
{
    foreach ($img_err as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {
            $name_key = basename($nam[$key]);

            return $name_key;
        }
    }
};

function AddImage($image_err, $tmp_name, $uploads_dir, $name)
{
    foreach ($image_err as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {
            $tmp_name_key = $tmp_name[$key];
            $name_key = basename($name[$key]);
            move_uploaded_file($tmp_name_key, "$uploads_dir/$name_key");
        }
    }
}