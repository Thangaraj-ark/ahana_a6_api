CREATE VIEW `v_documents` AS 
SELECT `a`.`doc_id` AS `doc_id`,`a`.`tenant_id` AS `tenant_id`,`a`.`encounter_id` AS `encounter_id`,`a`.`patient_id` AS `patient_id`,`b`.`doc_type` AS `doc_type`,`b`.`doc_type_name` AS `doc_type_name`,`b`.`doc_type_name` AS `doc_name`,`a`.`created_at` AS `date_time`,`a`.`status` AS `status`,`a`.`deleted_at` AS `deleted_at`,CONCAT(`c`.`title_code`,'',`c`.`name`) AS `created_by`,`t`.`tenant_name` AS `tenant_name` FROM (((`pat_documents` `a` JOIN `pat_document_types` `b` ON(`b`.`doc_type_id` = `a`.`doc_type_id`)) JOIN `co_user` `c` ON(`c`.`user_id` = `a`.`created_by`)) JOIN `co_tenant` `t` ON(`t`.`tenant_id` = `a`.`tenant_id`)) UNION ALL SELECT `a`.`scanned_doc_id` AS `doc_id`,`a`.`tenant_id` AS `tenant_id`,`a`.`encounter_id` AS `encounter_id`,`a`.`patient_id` AS `patient_id`,'SD' AS `doc_type`,'Scanned Documents' AS `doc_type_name`,`a`.`scanned_doc_name` AS `doc_name`,`a`.`scanned_doc_creation_date` AS `date_time`,`a`.`status` AS `status`,`a`.`deleted_at` AS `deleted_at`,CONCAT(`c`.`title_code`,'',`c`.`name`) AS `created_by`,`t`.`tenant_name` AS `tenant_name` FROM ((`pat_scanned_documents` `a` JOIN `co_user` `c` ON(`c`.`user_id` = `a`.`created_by`)) JOIN `co_tenant` `t` ON(`t`.`tenant_id` = `a`.`tenant_id`)) GROUP BY `a`.`scanned_doc_name`,`a`.`encounter_id`,`a`.`scanned_doc_creation_date` UNION ALL SELECT `a`.`other_doc_id` AS `doc_id`,`a`.`tenant_id` AS `tenant_id`,`a`.`encounter_id` AS `encounter_id`,`a`.`patient_id` AS `patient_id`,'OD' AS `doc_type`,'Other Documents' AS `doc_type_name`,`a`.`other_doc_name` AS `doc_name`,`a`.`created_at` AS `date_time`,`a`.`status` AS `status`,`a`.`deleted_at` AS `deleted_at`,CONCAT(`c`.`title_code`,'',`c`.`name`) AS `created_by`,`t`.`tenant_name` AS `tenant_name` FROM ((`pat_other_documents` `a` JOIN `co_user` `c` ON(`c`.`user_id` = `a`.`created_by`)) JOIN `co_tenant` `t` ON(`t`.`tenant_id` = `a`.`tenant_id`)) WHERE `a`.`status` = '1' AND `a`.`deleted_at` = '0000-00-00 00:00:00' ORDER BY `encounter_id` DESC,`date_time`