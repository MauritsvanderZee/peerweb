select p.* from prospects p join student s
on (s.snummer=p.snummer and s.opl= p.opl)
order by hoofdgrp,achternaam,roepnaam;
