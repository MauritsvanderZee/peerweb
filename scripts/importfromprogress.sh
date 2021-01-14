#!/bin/bash
scriptdir=$(dirname $0)
# expect three parameters: workdir, temp_file_with_extension, and full path to worksheet
if [ $# -lt 4 ]; then
    echo usage "importfromprogress.sh <workdir> <temp_file_with_extension> <full path to worksheet> <email>"
    exit 1
fi
workdir=$1
filename=$2
worksheet=$3
email=$4

echo " $#: workdir=${workdir}, filename=${filename}, worksheet=${worksheet}, usermail=${email}"

echo "executing as batch: ${scriptdir}/spreadsheet2xlsxAndMerge ${workdir} ${filename} ${worksheet} ${email}"
 ${scriptdir}/spreadsheet2xlsxAndMerge ${workdir} ${filename} ${worksheet} ${email} 
# ( ${scriptdir}/spreadsheet2xlsxAndMerge ${workdir} ${filename} ${worksheet} ${email} & )
exit 0


