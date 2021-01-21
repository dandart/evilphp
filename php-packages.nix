{composerEnv, fetchurl, fetchgit ? null, fetchhg ? null, fetchsvn ? null, noDev ? false}:

let
  packages = {};
  devPackages = {};
in
composerEnv.buildPackage {
  inherit packages devPackages noDev;
  name = "dandart-evilphp";
  src = ./.;
  executable = false;
  symlinkDependencies = false;
  meta = {
    license = "WTFPL";
  };
}