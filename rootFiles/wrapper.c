#include <stdlib.h>
#include <sys/types.h>
#include <unistd.h>

int main(int argc, char *argv[]){

	setuid (0);

	system("/bin/sh /home/pi/Documents/pi-web/rootFiles/command.sh");


	return 0;
}
