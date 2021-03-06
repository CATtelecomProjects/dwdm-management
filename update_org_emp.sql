﻿--  =========================================================================
--  #ORG
--  Compare 2 Table ข้อมูลใหม่ที่ไม่อยู่ในตางรางเก่า
/*
SELECT *
FROM tbl_sm_org_tmp
WHERE org_code NOT IN(SELECT
                        org_code
                      FROM tbl_sm_org);
*/
-- *************************************
--  Insert Data from New ORG table
INSERT INTO tbl_sm_org
SELECT *
FROM tbl_sm_org_tmp
WHERE org_code NOT IN(SELECT
                        org_code
                      FROM tbl_sm_org);

 /*
SELECT
  org_code,
  org_new
FROM tbl_sm_org a
  LEFT JOIN (SELECT
               org_code  AS org_new
             FROM tbl_sm_org_tmp) org_new
    ON a.org_code = org_new.org_new
    ORDER BY org_new;
*/
	
-- Insert Old ORG is not active to tmp table
 TRUNCATE TABLE tbl_tmp;
 
	INSERT INTO tbl_tmp
SELECT org_code
FROM tbl_sm_org
WHERE org_code NOT IN(SELECT
                        org_code
                      FROM tbl_sm_org_tmp);
	
	-- Update inactive ORG from Current
UPDATE tbl_sm_org
SET actived = 'N'
WHERE org_code IN(SELECT
                    CODE
                  FROM tbl_tmp);
	
	
	-- Update Current table from New Table data
	UPDATE tbl_sm_org t1
  INNER JOIN tbl_sm_org_tmp t2
    ON t1.org_code = t2.org_code
SET t1.org_name = t2.org_name,
  t1.org_short = t2.org_short,
  t1.org_parent = t2.org_parent,
  t1.org_level = t2.org_level;
  
  --  Update default Auth
  UPDATE tbl_sm_org SET default_auth ='Y' WHERE org_level < 60 ; --  ชฝ. ขึ้นไป
  UPDATE tbl_sm_org SET default_auth ='N' WHERE org_level >= 60;
  
  
--  =========================================================================
  #EMP
 --  Compare 2 Table ข้อมูลใหม่ที่ไม่อยู่ในตางรางเก่า 
/*
  SELECT *
FROM tbl_sm_emp_tmp
WHERE emp_code NOT IN(SELECT
                        emp_code
                      FROM tbl_sm_emp);
*/					  
-- *************************************
--  Insert Data from New EMP table					  
INSERT INTO tbl_sm_emp
SELECT *
FROM tbl_sm_emp_tmp
WHERE emp_code NOT IN(SELECT
                        emp_code
                      FROM tbl_sm_emp);		

-- Insert Old emp is not active to tmp table
 
 TRUNCATE TABLE tbl_tmp;

INSERT INTO tbl_tmp
SELECT
  emp_code
FROM tbl_sm_emp
WHERE emp_code NOT IN(SELECT
                        emp_code
                      FROM tbl_sm_emp_tmp);		

-- Update inactive emp from Current
UPDATE tbl_sm_emp
SET actived = 'N'
WHERE emp_code IN(SELECT
                    CODE
                  FROM tbl_tmp);	


-- update ระดับ ชฝ.ขึ้นให้ default = Y
/*
SELECT *
FROM tbl_sm_emp
WHERE org_code IN(SELECT
                    org_code
                  FROM tbl_sm_org
                  WHERE org_level < 60)
    AND emp_admin_code IN("ก", "ง", "ฐ", "ต", "ฉ", "ค", "ช", "ฌ", "ภ");	
*/

--  insert ระดับ ชฝ.ขึ้นไปพักไว้ที่ tmp

 TRUNCATE TABLE tbl_tmp;

INSERT INTO tbl_tmp
SELECT emp_code
FROM tbl_sm_emp
WHERE org_code IN(SELECT
                    org_code
                  FROM tbl_sm_org
                  WHERE org_level < 60)
    AND emp_admin_code IN("ก", "ง", "ฐ", "ต", "ฉ", "ค", "ช", "ฌ", "ภ");	


-- query for update tbl_sm_emp -> default = Y
UPDATE tbl_sm_emp
SET default_auth = 'Y'
WHERE emp_code IN(SELECT
                    CODE
                  FROM tbl_tmp);	  

-- update emp detail
UPDATE tbl_sm_emp t1
  INNER JOIN tbl_sm_emp_tmp t2
    ON t1.emp_code = t2.emp_code
SET t1.emp_name = t2.emp_name,
  t1.emp_pos_short = t2.emp_pos_short,
  t1.emp_pos_desc = t2.emp_pos_desc,
  t1.emp_admin_code = t2.emp_admin_code,
  t1.emp_type = t2.emp_type,
  t1.emp_email = t2.emp_email,
  t1.org_code = t2.org_code,
   t1.emp_actived = t2.emp_actived;
   
   -- Delete old user
DELETE
FROM tbl_sm_emp
WHERE emp_code NOT IN(SELECT
                        emp_code
                      FROM tbl_sm_emp_tmp)
ORDER BY emp_code;
  
  