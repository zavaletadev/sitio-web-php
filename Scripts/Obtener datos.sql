-- Seleccionar a todos los alumnos en orden alfabético por el primer apellido
SELECT * FROM alumno order by apellido1 ASC

-- Seleccionar calificaciones de alumnos por grupo
SELECT 
grupo.cve_grupo,
alumno.matricula, 
CONCAT(alumno.apellido1, " ",alumno.apellido2, " ", alumno.nombres) AS nombre_completo, 
materia.nombre_materia, 
calificacion.calificacion
FROM calificacion 
JOIN alumno USING(matricula) 
JOIN grupo USING(cve_grupo) 
JOIN materia USING(cve_materia) 
WHERE grupo.cve_grupo = 'DRD-2021'

-- Seleccionar calificaciones de alumnos aprobados por grupo
SELECT 
grupo.cve_grupo,
alumno.matricula, 
CONCAT(alumno.apellido1, " ",alumno.apellido2, " ", alumno.nombres) AS nombre_completo, 
materia.nombre_materia, 
calificacion.calificacion
FROM calificacion 
JOIN alumno USING(matricula) 
JOIN grupo USING(cve_grupo) 
JOIN materia USING(cve_materia) 
WHERE grupo.cve_grupo = 'DSM-7129' 
AND calificacion.calificacion >= 6

-- Seleccionar calificaciones de alumnos reprobados por grupo
SELECT 
grupo.cve_grupo,
alumno.matricula, 
CONCAT(alumno.apellido1, " ",alumno.apellido2, " ", alumno.nombres) AS nombre_completo, 
materia.nombre_materia, 
calificacion.calificacion
FROM calificacion 
JOIN alumno USING(matricula) 
JOIN grupo USING(cve_grupo) 
JOIN materia USING(cve_materia) 
WHERE grupo.cve_grupo = 'DSM-7129' 
AND calificacion.calificacion < 6

-- Seleccionar calificaciones de alumnos por cuadro de honor por grupo
SELECT 
grupo.cve_grupo,
alumno.matricula, 
CONCAT(alumno.apellido1, " ",alumno.apellido2, " ", alumno.nombres) AS nombre_completo, 
materia.nombre_materia, 
calificacion.calificacion
FROM calificacion 
JOIN alumno USING(matricula) 
JOIN grupo USING(cve_grupo) 
JOIN materia USING(cve_materia) 
WHERE grupo.cve_grupo = 'DRD-2023' 
AND calificacion.calificacion >= 8
ORDER BY calificacion.calificacion DESC

-- Seleccionar calificaciones de alumnos por cuadro de honor (todos los grupos)
SELECT 
grupo.cve_grupo,
alumno.matricula, 
CONCAT(alumno.apellido1, " ",alumno.apellido2, " ", alumno.nombres) AS nombre_completo, 
materia.nombre_materia, 
calificacion.calificacion
FROM calificacion 
JOIN alumno USING(matricula) 
JOIN grupo USING(cve_grupo) 
JOIN materia USING(cve_materia) 
WHERE calificacion.calificacion >= 8
ORDER BY calificacion.calificacion DESC

-- Seleccionar calificaciones de alumnos por materia (todos sus grupos)
SELECT 
grupo.cve_grupo,
alumno.matricula, 
CONCAT(alumno.apellido1, " ",alumno.apellido2, " ", alumno.nombres) AS nombre_completo, 
materia.nombre_materia, 
calificacion.calificacion
FROM calificacion 
JOIN alumno USING(matricula) 
JOIN grupo USING(cve_grupo) 
JOIN materia USING(cve_materia) 
WHERE materia.cve_materia = 'MAT-001'


-- Seleccionar calificaciones de alumnos por matricula (todos sus grupos)
SELECT 
grupo.cve_grupo,
alumno.matricula, 
CONCAT(alumno.apellido1, " ",alumno.apellido2, " ", alumno.nombres) AS nombre_completo, 
materia.nombre_materia, 
calificacion.calificacion
FROM calificacion 
JOIN alumno USING(matricula) 
JOIN grupo USING(cve_grupo) 
JOIN materia USING(cve_materia) 
WHERE alumno.matricula = '105027' 