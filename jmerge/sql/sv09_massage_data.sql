begin work;
update sv09_ingeschrevenen set geboorteland='Bondsrepubliek Duitsland' where geboorteland='Duitsland';
update sv09_ingeschrevenen set land='Bondsrepubliek Duitsland' where land='Duitsland';
update sv09_ingeschrevenen set land='Verenigd Koninkrijk'  where land='Groot-Brittannië';
update sv09_ingeschrevenen set geboorteland='Verenigd Koninkrijk'  where geboorteland='Groot-Brittannië';
update sv09_ingeschrevenen set land='Republiek Moldavië'  where land='Moldavië';
update sv09_ingeschrevenen set geboorteland='Republiek Moldavië'  where geboorteland='Moldavië';
update sv09_ingeschrevenen set land='Groothertogdom Luxemburg'  where land='Luxemburg';
update sv09_ingeschrevenen set geboorteland='Groothertogdom Luxemburg'  where geboorteland='Luxemburg';
update sv09_ingeschrevenen set geboorteland='Israël'  where geboorteland='Israel';
update sv09_ingeschrevenen set land='Israël'  where land='Israel';
update sv09_ingeschrevenen set land='Verenigde Staten'  where land='Verenigde Staten van Amerika';
update sv09_ingeschrevenen set geboorteland='Verenigde Staten'  where geboorteland='Verenigde Staten van Amerika';
update sv09_ingeschrevenen set geboorteland='Tsjechië'  where geboorteland='Tsjecho-Slowakije';
update sv09_ingeschrevenen set land='Tsjechië'  where land='Tsjecho-Slowakije';

update sv09_ingeschrevenen set geboorteland='Joegoslavië'  where geboorteland='Federale Republiek Joegoslavië';
update sv09_ingeschrevenen set land='Joegoslavië'  where land='Federale Republiek Joegoslavië';

update sv09_ingeschrevenen set geboorteland='Groothertogdom Luxemburg'  where geboorteland='Luxemburg';
update sv09_ingeschrevenen set land='Groothertogdom Luxemburg'  where land='Luxemburg';

update sv09_ingeschrevenen set geboorteland='Verenigde Staten van Amerika'  where geboorteland='Verenigde Staten';
update sv09_ingeschrevenen set land='Verenigde Staten van Amerika'  where land='Verenigde Staten';

update sv09_ingeschrevenen set geboorteland='Republiek Moldavië'  where geboorteland='Moldavië';
update sv09_ingeschrevenen set land='Republiek Moldavië'  where land='Moldavië';

update sv09_ingeschrevenen set geboorteland='Somalia'  where geboorteland='Somalië';
update sv09_ingeschrevenen set land='Somalia'  where land='Somalië';

update sv09_ingeschrevenen set geboorteland='Wit Rusland'  where geboorteland='Belarus';
update sv09_ingeschrevenen set land='Wit Rusland'  where land='Belarus';

commit;
