<?php

function getMapping($conn, $sql, $key, $value) {
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $array_ = array();

    while ($row = $result->fetch_assoc()) {
        $array_[$row[$key]] = $row[$value];
    }

    $stmt->close();

    return $array_;
}

?>